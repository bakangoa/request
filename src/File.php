<?php

    namespace Bakangoa\Http\Request;

    use CURLFile;

    class File extends CURLFile
    {
        
        public function __construct(string $path, string $name, string $mime_type)
        {
            parent::__construct($path, "", $name);
        }
    }
    

?>