<?php
define('nl', chr(10));

function prt_mess($in)
{
    print("\n" . $in . "\n");
}

function prt_warn($in)
{
    error_log($in);

}

function prt_error($in)
{
    trigger_error($in, E_USER_WARNING);
}

function p($in)
{
    if (is_string($in))
    {
        print ("\n$in\n");
    }
    elseif (is_object($in))
    {
        if (is_a($in, 'java_InternalJava'))
        {
            print("Class:\n");
            print ("java_InternalJava\n");
            print ("Wrapping Java class => " . $in->__signature . "\n");
            echo("Actual value => " . $in . "");
        }
        else
        {
            $class_name = get_class($in);
            $about_class = "Class:\n";
            $about_class .= $class_name . "\n";
            $class_methods = get_class_methods($in);
            $about_class .= "List of methods:\n";
            foreach ($class_methods as $current)
            {
                $about_class .= $current . "; ";
            }
            print($about_class);
        }
    }
}


function is_exists($file_path): bool
{
    if (file_exists($file_path))
    {
        prt_mess("File ".$file_path." exists");
        return true;
    }
    else
    {
        prt_mess("File ".$file_path." doesn't exist");
        return false;
    }
}

class License extends BaseJavaClass
{
    protected $javaClassName = "com.aspose.php.barcode.license.PhpLicense";

    public function __construct()
    {
        parent::__construct(new java($this->javaClassName));
    }

    public function setLicense($filePath)
    {
        try
        {
            $file_data = self::openFile($filePath);
            $this->getJavaClass()->setLicense($file_data);
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    public function isLicensed(): string
    {
        $is_licensed = $this->getJavaClass()->isLicensed();
        return strval($is_licensed);
    }

    private static function openFile($filename)
    {
        return unpack("C*", file_get_contents($filename));
    }

    protected function init(): void
    {
//      do nothing
    }
}

class Point
{
    /**
     * The X coordinate.
     */
    public $x;

    /**
     * The Y coordinate.
     */
    public $y;

    /**
     * Rectangle constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function toString()
    {
        return $this->x . ',' . $this->y;
    }
}

class Rectangle
{

    /**
     * The X coordinate of the upper-left corner of the <code>Rectangle</code>.
     *
     * @serial
     * @see #setLocation(int, int)
     * @see #getLocation()
     * @since 1.0
     */
    public $x;

    /**
     * The Y coordinate of the upper-left corner of the <code>Rectangle</code>.
     *
     * @serial
     * @see #setLocation(int, int)
     * @see #getLocation()
     * @since 1.0
     */
    public $y;

    /**
     * The width of the <code>Rectangle</code>.
     * @serial
     * @see #setSize(int, int)
     * @see #getSize()
     * @since 1.0
     */
    public $width;

    /**
     * The height of the <code>Rectangle</code>.
     *
     * @serial
     * @see #setSize(int, int)
     * @see #getSize()
     * @since 1.0
     */
    public $height;

    /**
     * Rectangle constructor.
     * @param $x
     * @param $y
     * @param $width
     * @param $height
     */
    public function __construct($x, $y, $width, $height)
    {
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function getLeft()
    {
        return $this->getX();
    }

    public function getTop()
    {
        return $this->getY();
    }

    public function getRight()
    {
        return $this->getX() + $this->getWidth();
    }

    public function getBottom()
    {
        return $this->getY() + $this->getHeight();
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function toString()
    {
        return $this->x . ',' . $this->y . ',' . $this->width . ',' . $this->height;
    }

    private function intersectsWithInclusive(Rectangle $r)
    {
        return !(($this->getLeft() > $r->getRight()) || ($this->getRight() < $r->getLeft()) ||
            ($this->getTop() > $r->getBottom()) || ($this->getBottom() < $r->getTop()));
    }

    /**
     * Intersect Shared Method
     * Produces a new Rectangle by intersecting 2 existing
     * Rectangles. Returns null if there is no    intersection.
     */

    public static function intersect(Rectangle $a, Rectangle $b): Rectangle
    {
        // MS.NET returns a non-empty rectangle if the two rectangles
        // touch each other
        if (!$a->intersectsWithInclusive($b))
        {
            return new Rectangle(0, 0, 0, 0);
        }

        return Rectangle::fromLTRB(
            max($a->getLeft(), $b->getLeft()),
            max($a->getTop(), $b->getTop()),
            min($a->getRight(), $b->getRight()),
            min($a->getBottom(), $b->getBottom()));
    }

    /**
     * FromLTRB Shared Method
     * Produces a Rectangle structure from left, top, right,
     * and bottom coordinates.
     */

    public static function fromLTRB($left, $top,
                                    $right, $bottom): Rectangle
    {
        return new Rectangle($left, $top, $right - $left,
            $bottom - $top);
    }

    public function isEmpty()
    {
        return ($this->width <= 0) || ($this->height <= 0);
    }
}

abstract class BaseJavaClass
{
    private $javaClass;
    private $javaClassName;

    function __construct($javaClass)
    {
        try
        {
            $this->javaClass = $javaClass;
            $this->init();

            if (empty($this->javaClassName))
            {
                $this->javaClassName = $this->javaClass->__signature;
            }
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    protected abstract function init(): void;

    /**
     * @return mixed
     */
    public function getJavaClass()
    {
        return $this->javaClass;
    }

    /**
     * @return mixed
     */
    protected function setJavaClass($javaClass)
    {
        $this->javaClass= $javaClass;
        $this->init();
    }

    public function getJavaClassName(): string
    {
        return $this->javaClassName;
    }

    public function isNull(): bool
    {
        return java_cast($this->javaClass->isNull(), "boolean");
    }

    public function printJavaClassName()
    {
        p("Java class name => '" . $this->javaClassName . "'");
    }
}

/**
 * Class BarcodeException
 */
class BarcodeException extends Exception
{
    const MAX_LINES = 4;

    /**
     * BarcodeException constructor.
     * @param  $exc exception's instance
     */
    public function __construct($exc)
    {
        if (is_string($exc))
        {
            $this->setMessage($exc);
            return;
        }
        $line = $this->getLine();
        $file = $this->getFile();
        $exc_message = "Exception occured in $file:$line" . nl;
        $details = $this->getDetails($exc);

        if (empty($details))
        {
            $this->setMessage($exc_message);
            return;
        }
        $lines = explode("\n", $details);


        $counter = 0;
        foreach ($lines as $line)
        {
            if ($counter >= self::MAX_LINES)
            {
                break;
            }
            $counter++;
            $exc_message .= $line . nl;
        }
        $this->setMessage($exc_message);
    }

    private function getDetails($exc)
    {
        $details = "";
        if (is_string($exc))
        {
            return $exc;
        }
        if (get_class($exc) != null)
        {
            $details = "exception type : " . get_class($exc) . "\n";
        }
        if (method_exists($exc, "__toString"))
        {
            $details .= $exc->__toString();
        }
        if (method_exists($exc, "getMessage"))
        {
            $details .= $exc->getMessage();
        }
        if (method_exists($exc, "getCause"))
        {
            $details .= $exc->getCause();
        }
        return $details;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

}

?>
