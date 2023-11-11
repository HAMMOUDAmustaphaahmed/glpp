1.在 application/libraries/目录下新建一个类文件 Phpmailer_library.php代码如下
```
class Phpmailer_library
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        require_once(APPPATH."third_party/phpmailer/PHPMailerAutoload.php");
        $objMail = new PHPMailer;
        return $objMail;
    }
}
```
2.复制phpmailer文件夹到application/third_party下

3.在控制器中调用,调试输出PHPMailer对象
```
class Welcome extends CI_Controller {
    public function index()
    {
        $this->load->library("phpmailer_library");
        $mail = $this->phpmailer_library->load();
        echo '<pre>';print_r($mail);die;
    }
}
```
