<?php

namespace Source\Core;

class Message {

    
    private $text;
    private $type;
    private $icon;

    /**
     * @return string
     */
    public function __toString(): string {
        return $this->render();
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    public function getIcon(): string {
        return $this->icon;
    }

    public function info(string $message): Message {
        $this->type = CONF_MESSAGE_INFO;
        $this->icon = CONF_ICON_INFO;
        $this->text = $this->filter($message);
        return $this;
    }

    public function success(string $message): Message {
        $this->type = CONF_MESSAGE_SUCESS;
        $this->icon = CONF_ICON_SUCCESS;
        $this->text = $this->filter($message);
        return $this;
    }

    public function warning(string $message): Message {
        $this->type = CONF_MESSAGE_WARNING;
        $this->icon = CONF_ICON_WARNING;
        $this->text = $this->filter($message);
        return $this;
    }

    public function error(string $message): Message {
        $this->type = CONF_MESSAGE_ERROR;
        $this->icon = CONF_ICON_ERROR;
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @return string
     */
    public function render(): string {
        return "<div class='" . CONF_MESSAGE_CLASS. " message-" . $this->getType() . "'><i class='bx {$this->getIcon()}' style='margin-right: 5px; font-size: 1.5rem'></i>" . $this->getText() . "</div>";
    }

    /**
     * @return string
     */
    public function json(): string {
        return json_encode(["error" => [$this->getIcon(), $this->getText()]]);
    }

    public function flash(): void {
        (new Session())->set("flash", $this);
    }

    /**
     * @param string $message
     * @return string
     */
    private function filter(string $message): string {
        return filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);
    }

}

/**
define("CONF_MESSAGE_CLASS", "message");
define("CONF_MESSAGE_INFO", "info");
define("CONF_MESSAGE_SUCESS", "sucess");
define("CONF_MESSAGE_WARNING", "warning");
define("CONF_MESSAGE_ERROR", "danger");
*/