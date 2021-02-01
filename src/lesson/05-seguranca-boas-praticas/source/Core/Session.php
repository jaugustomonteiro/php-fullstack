<?php

namespace Source\Core;

class Session {

    /**
     * Session Constructor
     */
    public function __construct() {
        
        if(!session_id()) {
            session_save_path(CONF_SESSION_PATH);
            session_start();
        }
    }

    /**
     * @param mixed $name
     * @return void
     */
    public function __get($name) {
        if(empty($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return null;       
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name) {
        return $this->has($name);
    }

    /**
     * @return object|null
     */
    public function all(): ?object {
        return (object)$_SESSION;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return Session
     */
    public function set(string $key, $value): Session {
        $_SESSION[$key] = (is_array($value) ? (object)$value : $value);
        return $this;
    }

    /**
     * @param string $key
     * @return Session
     */
    public function unset(string $key): Session {
        unset($_SESSION[$key]);
        return $this;
    }

    /**
     * @param string $key
     * @return boolean
     */
    public function has(string $key): bool {
        return isset($_SESSION[$key]);
    }

    /**
     * @return Session
     */
    public function regenerate(): Session {
        session_regenerate_id(true);
        return $this;
    }

    /**
     * @return Session
     */
    public function destroy(): Session {
        session_destroy();
        return $this;
    }

    /**
     * @return Message|null
     */
    public function flash(): ?Message {
        if($this->has("flash")) {
            $flash = $this->flash;
            $this->unset("flash");
            return $flash;
        }

        return null;
    }
}