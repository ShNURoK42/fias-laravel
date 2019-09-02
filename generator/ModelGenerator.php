<?php

declare(strict_types=1);

namespace Liquetsoft\Fias\Laravel\LiquetsoftFiasBundle\Generator;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Liquetsoft\Fias\Component\EntityDescriptor\EntityDescriptor;
use Liquetsoft\Fias\Component\EntityField\EntityField;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpLiteral;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PsrPrinter;
use SplFileInfo;

/**
 * Объект, который создает классы моделей из описания моделей в yaml.
 */
class ModelGenerator extends AbstractGenerator
{
    /**
     * @inheritDoc
     */
    protected function generateClassByDescriptor(EntityDescriptor $descriptor, SplFileInfo $dir, string $namespace): void
    {
        $name = $this->unifyClassName($descriptor->getName());
        $fullPath = "{$dir->getPathname()}/{$name}.php";

        $phpFile = new PhpFile;
        $phpFile->setStrictTypes();

        $namespace = $phpFile->addNamespace($namespace);
        $this->decorateNamespace($namespace, $descriptor);

        $class = $namespace->addClass($name)->addExtend(Model::class);
        $this->decorateClass($class, $descriptor);

        file_put_contents($fullPath, (new PsrPrinter)->printFile($phpFile));
    }

    /**
     * Добавляет все необходимые импорты в пространство имен.
     *
     * @param PhpNamespace     $namespace
     * @param EntityDescriptor $descriptor
     */
    protected function decorateNamespace(PhpNamespace $namespace, EntityDescriptor $descriptor): void
    {
        $namespace->addUse(Model::class);
        foreach ($descriptor->getFields() as $field) {
            if ($field->getSubType() === 'date') {
                $namespace->addUse(Carbon::class);
            }
        }
    }

    /**
     * Добавляет всен необходимые для класса комментарии.
     *
     * @param ClassType        $class
     * @param EntityDescriptor $descriptor
     */
    protected function decorateClass(ClassType $class, EntityDescriptor $descriptor): void
    {
        $description = ucfirst(trim($descriptor->getDescription(), " \t\n\r\0\x0B."));
        if ($description) {
            $class->addComment("{$description}.\n");
        }

        $fill = [];
        foreach ($descriptor->getFields() as $field) {
            $this->decorateProperty($class, $field);
            $fill[] = $this->unifyColumnName($field->getName());
        }

        $tableName = $this->convertClassnameToTableName($descriptor->getName());
        $class->addProperty('table', $tableName)
            ->setVisibility('protected')
            ->addComment('@var string')
        ;

        $defaultValue = new PhpLiteral("[\n    '" . implode("',\n    '", $fill) . "',\n]");
        $class->addProperty('fillable', $defaultValue)
            ->setVisibility('protected')
            ->addComment('@var string[]')
        ;

        $class->addMethod('getIncrementing')
            ->addComment('@inheritDoc')
            ->setVisibility('public')
            ->setReturnType('bool')
            ->setBody('return false;');
    }

    /**
     * Добавляет все свойства в формате phpDoc, поскольку в laravel они используют магию.
     *
     * @param ClassType   $class
     * @param EntityField $field
     */
    protected function decorateProperty(ClassType $class, EntityField $field): void
    {
        $name = $this->unifyColumnName($field->getName());
        $type = trim($field->getType() . '_' . $field->getSubType(), ' _');

        switch ($type) {
            case 'int':
                $varType = 'int' . ($field->isNullable() ? '|null' : '');
                break;
            case 'string_date':
                $varType = 'Carbon' . ($field->isNullable() ? '|null' : '');
                break;
            default:
                $varType = 'string' . ($field->isNullable() ? '|null' : '');
                break;
        }

        $class->addComment("@property {$varType} \${$name}");
    }
}
