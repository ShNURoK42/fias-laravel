<?php

declare(strict_types=1);

namespace Liquetsoft\Fias\Laravel\LiquetsoftFiasBundle\Command;

use Exception;
use Illuminate\Console\Command;
use Liquetsoft\Fias\Component\Pipeline\State\ArrayState;
use Liquetsoft\Fias\Component\Pipeline\Task\Task;

/**
 * Команда, которая очищает хранилища для всех сущностей проекта, привязанных
 * к сущностям ФИАС.
 */
class TruncateCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'liquetsoft:fias:truncate';

    /**
     * @var string
     */
    protected $description = 'Truncates storage for binded entities.';

    /**
     * @var Task
     */
    protected $task;

    /**
     * В конструкторе передаем ссылку на операцию очистки таблицы.
     */
    public function __construct()
    {
        parent::__construct();
        $this->task = $this->getLaravel()->get('liquetsoft_fias.task.data.truncate');
    }

    /**
     * Запуск команды на исполнение.
     *
     * @throws Exception
     */
    public function handle(): void
    {
        $this->info('Truncating storage for binded entities.');

        $state = new ArrayState;
        $this->task->run($state);

        $this->info('Storage truncated.');
    }
}
