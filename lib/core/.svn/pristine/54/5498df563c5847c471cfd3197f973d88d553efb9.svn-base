<?php
if (!defined('MONK_VERSION')) exit('Access is no allowed.');

class uploader{
    static protected $_files;
    static protected $_init = false;

    function __construct()
    {
        if (self::$_init) return;

        self::$_init = true;
        self::$_files = array();

        foreach ($_FILES as $field_name => $postinfo)
        {
            if (!isset($postinfo['error'])) continue;
            if (is_array($postinfo['error']))
            {
                // 多文件上传
                foreach ($postinfo['error'] as $offset => $error)
                {
                    if ($error == UPLOAD_ERR_OK)
                    {
                        $file = new uploader_file($postinfo, $field_name, $offset);
                        self::$_files["{$field_name}{$offset}"] = $file;
                    }
                }
            }
            else
            {
                if ($postinfo['error'] == UPLOAD_ERR_OK)
                {
                    self::$_files[$field_name] = new uploader_file($postinfo, $field_name);
                }
            }
        }
    }

    function allowedUploadSize()
    {
        $val = trim(ini_get('upload_max_filesize'));
        $last = strtolower($val{strlen($val) - 1});
        switch ($last)
        {
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
        }
        return $val;
    }

    function filesCount()
    {
		return count(self::$_files);
	}

    function allFiles()
    {
        return self::$_files;
    }

    function existsFile($name)
    {
        return isset(self::$_files[$name]);
    }

    function file($name)
    {
        return self::$_files[$name];
    }

    function moveAll($dest_dir)
    {
        $dest_dir = rtrim($dest_dir, '/\\') . DS;
        foreach (self::$_files as $file)
        {
            $dest = $dest_dir . $file->filename();
            $file->move($dest);
        }
    }
}

class uploader_file{
    protected $_file = array();
    protected $_name;

    function __construct(array $struct, $name, $ix = false)
    {
        if ($ix !== false)
        {
            $this->_file = array(
                'name'     => $struct['name'][$ix],
                'type'     => $struct['type'][$ix],
                'tmp_name' => $struct['tmp_name'][$ix],
                'error'    => $struct['error'][$ix],
                'size'     => $struct['size'][$ix],
            );
        }
        else
        {
            $this->_file = $struct;
        }

        $this->_file['full_path'] = $this->_file['tmp_name'];
        $this->_file['is_moved'] = false;
        $this->_name = $name;
    }

    function name()
    {
        return $this->_name;
    }

    function isSuccessed()
    {
        return $this->_file['error'] == UPLOAD_ERR_OK;
    }

    function errorCode()
    {
        return $this->_file['error'];
    }

    function isMoved()
    {
        return $this->_file['is_moved'];
    }

    function filename()
    {
        return $this->_file['name'];
    }

    function extname()
    {
        return pathinfo($this->filename(), PATHINFO_EXTENSION);
    }

    function filesize()
    {
        return $this->_file['size'];
    }

    function mimeType()
    {
        return $this->_file['type'];
    }

    function tmpFilename()
    {
        return $this->_file['tmp_name'];
    }
    
    //$file->isValid('jpg, jpeg, png', 2048 * 1024)
    function filepath()
    {
        return $this->_file['full_path'];
    }

    function isValid($allowed_types = null, $max_size = null)
    {
        if (!$this->isSuccessed()) return false;

        if ($allowed_types)
        {
            $allowed_types = explode(',',$allowed_types);

            foreach ($allowed_types as $offset => $extname)
            {
                if ($extname{0} == '.') $extname = substr($extname, 1);
                $allowed_types[$offset] = strtolower($extname);
            }
            $allowed_types = array_flip($allowed_types);

            $filename = strtolower(basename($this->filename()));
            $extnames = explode('.', $filename);
            array_shift($extnames);
            $passed = false;

            for ($i = count($extnames) - 1; $i >= 0; $i--)
            {
                $checking_ext = implode('.', array_slice($extnames, $i));
                if (isset($allowed_types[$checking_ext]))
                {
                    $passed = true;
                    break;
                }
            }

            if (!$passed) return false;
        }

        if ($max_size > 0 && ($this->filesize() > $max_size))
        {
            return false;
        }

        return true;
    }

    function move($dest_path)
    {
        if ($this->_file['is_moved'])
        {
            $ret = rename($this->filepath(), $dest_path);
        }
        else
        {
            $this->_file['is_moved'] = true;
            $ret = move_uploaded_file($this->filepath(), $dest_path);
        }
        if ($ret)
        {
            $this->_file['full_path'] = $dest_path;
        }
        return $this;
    }

    function copy($dest_path)
    {
        copy($this->filepath(), $dest_path);
        return $this;
    }

    function unlink()
    {
        unlink($this->filepath());
        return $this;
    }

}