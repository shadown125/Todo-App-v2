<?php

declare(strict_types=1);

namespace App\Controller;

use App\Exception\ConfigurationException;
use App\Request;
use App\View;
use App\Model\TodoModel;


abstract class AbstractController
{
    protected const DEFAULT_ACTION = 'renderSite';

    private static array $configuration = [];

    protected TodoModel $todoModel;
    protected View $view;
    protected Request $request;

    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;
    }

    public function __construct(Request $request)
    {
        if(empty(self::$configuration['db'])) {
            throw new ConfigurationException('Configuration error');
        }
        $this->todoModel = new TodoModel(self::$configuration['db']);

        $this->request = $request;
        $this->view = new View();
    }

    final public function run(): void
    {
        $action = $this->action() . 'Action';
        if (!method_exists($this, $action)) {
            $action = self::DEFAULT_ACTION . 'Action';
        }
        $this->$action();
    }

    final protected function redirect(string $to): void
    {
        $location = $to;

        header("Location: $location");
        exit;
    }

    private function action(): string
    {
        return $this->request->getParam('action', self::DEFAULT_ACTION);
    }
}