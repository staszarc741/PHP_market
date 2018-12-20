<?php

namespace core;

class ErrorsExceptionHandler {
    /**
     * generate error message with backtrace
     * 
     * @param int $errno
     * @param string $errstr
     * @param string $errfile
     * @param int $errline
     * @return null
     */
    public function handleError($errno, $errstr, $errfile, $errline) {
        if ($this->isErrorIgnorable($errno)) {
            return null;
        }
        $error = $this->getErrorTitle($errno);
        error_log("PHP $error:  $errstr in $errfile on line $errline");
        $this->printErrorMessage($errstr, $error, $errfile, $errline);
        $this->printBacktrace(debug_backtrace());
        exit(1);
    }

    /**
     * generate exception message with backtrace
     *
     * @param \Exception $exception
     */
    public function handleException($exception) {
        $this->printExceptionMessage($exception);
        $this->printBacktrace($exception->getTrace());
    }

    /**
     * check error to ignore
     *
     * @param int $errno
     * @return bool
     */
    private function isErrorIgnorable($errno) {
        $errno = $errno & error_reporting();
        if($errno == 0) {
            return true;
        }
        return false;
    }

    /**
     * get error title by error number
     *
     * @param int $errno
     * @return $error
     */
    private function getErrorTitle($errno) {
        switch($errno) {
            case E_ERROR:
                $error = "Error";
                break;
            case E_WARNING:
                $error = "Warning";
                break;
            case E_PARSE:
                $error = "Parse Error";
                break;
            case E_NOTICE:
                $error = "Notice";
                break;
            case E_CORE_ERROR:
                $error = "Core Error";
                break;
            case E_CORE_WARNING:
                $error = "Core Warning";
                break;
            case E_COMPILE_ERROR:
                $error = "Compile Error";
                break;
            case E_COMPILE_WARNING:
                $error = "Compile Warning";
                break;
            case E_USER_ERROR:
                $error = "User Error";
                break;
            case E_USER_WARNING:
                $error = "User Warning";
                break;
            case E_USER_NOTICE:
                $error = "User Notice";
                break;
            case E_STRICT:
                $error = "Strict Notice";
                break;
            case E_RECOVERABLE_ERROR:
                $error = "Recoverable Error";
                break;
            default:
                $error = "Unknown error ($errno)";
                break;
        }
        return $error;
    }

    /**
     * print error message
     *
     * @param string $errstr
     * @param string $error
     * @param string $errfile
     * @param int $errline
     */
    private function printErrorMessage($errstr, $error, $errfile, $errline) {
        $message = "ERROR: [{$error}] <i>{$errstr}</i> " . " in file <b>{$errfile}</b> on line <b>{$errline}</b>";
        print $message;
    }

    /**
     * print backtrace by function in parameters
     *
     * @param array $backtrace
     */
    private function printBacktrace($backtrace) {
        print "<br> backtrace: ";
        foreach($backtrace as $value) {
            print "In function <b> {$value['function']} </b> ";
            if($value['file']) print " in <b> {$value['file']} </b> file ";
            if($value['line']) print " on line <b> {$value['line']} </b>";
            print "<br>";
        }
    }

    /**
     * print exception message
     *
     * @param \Exception $exception
     */
    private function printExceptionMessage($exception) {
        print "<i>" . get_class($exception) . " [" . $exception->getCode() . "]: " . $exception->getMessage() . "</i> in file <b>" . $exception->getFile() . "</b> on line <b>" . $exception->getLine() . "</b>\n";
    }
}
