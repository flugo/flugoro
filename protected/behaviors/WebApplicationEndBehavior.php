<?php
/**
 * Project: flugo
 * Author: Catirau Mihail
 * Date: 11.12.13
 */

class WebApplicationEndBehavior extends CBehavior
{
    private $_endName;

    public function getEndName()
    {
        return $this->_endName;
    }


    public function runEnd($name)
    {
        $this->_endName = $name;

        $this->onModuleCreate = array($this, 'changeModulePaths');
        $this->onModuleCreate(new CEvent ($this->owner));

        $this->owner->run();
    }

    public function onModuleCreate($event)
    {
        $this->raiseEvent('onModuleCreate', $event);
    }

    protected function changeModulePaths($event)
    {
        // добавляем название части сайта (frontend или backend) в путь, по которому фреймворк будет искать контроллеры и вьюшки
        $event->sender->controllerPath .= DIRECTORY_SEPARATOR.$this->_endName;
        $event->sender->viewPath .= DIRECTORY_SEPARATOR.$this->_endName;
    }

}