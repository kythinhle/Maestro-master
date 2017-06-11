## Setup 
## I. Config and Database
(Đây là lần đầu em sử dụng github nên không biết tại sao file .env và composer.phar không up lên được, chắc là mặc định. Vì thế em sẽ thông tin config ở đây luôn.)<br/>

-Install composer<br/>

APP_NAME=Laravel<br/>
APP_ENV=local<br/>
APP_KEY=base64:g7Ny+0032+0i5EAFE0C0FkCZb+CdlBn6nK/GmT0s6sQ=<br/>
APP_DEBUG=true<br/>
APP_LOG_LEVEL=debug<br/>
APP_URL=http://localhost<br/>

DB_CONNECTION=mysql<br/>
DB_HOST=127.0.0.1<br/>
DB_PORT=3306<br/>
DB_DATABASE=maestro<br/>
DB_USERNAME=root<br/>
DB_PASSWORD=<br/>

BROADCAST_DRIVER=log<br/>
CACHE_DRIVER=file<br/>
SESSION_DRIVER=file<br/>
QUEUE_DRIVER=sync<br/>

REDIS_HOST=127.0.0.1<br/>
REDIS_PASSWORD=null<br/>
REDIS_PORT=6379<br/>

MAIL_DRIVER=smtp<br/>
MAIL_HOST=smtp.mailtrap.io<br/>
MAIL_PORT=2525<br/>
MAIL_USERNAME=null<br/>
MAIL_PASSWORD=null<br/>
MAIL_ENCRYPTION=null<br/>

PUSHER_APP_ID=<br/>
PUSHER_APP_KEY=<br/>
PUSHER_APP_SECRET=<br/>

## II.Giao diện Admin 
* Để truy cập vào khu vực Admin, gõ đường dẫn :localhost/AdminTool/dashboard 
1. *Phần login, Logout* <br/>
-Sau khi gõ vào đường dẫn trên, url sẽ tự động redirect sang trang admin_login thông qua bảo mật middleware (đăng nhập bằng tài khoản: boconganh@gmail.com và password: site@123)<br/>
-Khi đã trang nhập thành công vào khu vực admin, sẽ có chức năng logout nằm ở phía trên góc phải màn hình

2. *Phần Banner*:
-Gồm có phần danh sách và khu vực để thêm, xóa, sửa
<ul>
  <li>2.1 Danh sách</li>
  -Liệt kê items, có thể thay đổi được nội dung và hình ảnh trên banner chính bằng việc nhấp chuột vào thanh trạng thái <br/>
  (hạn chế: vì chỉ có một banner chính, nên khi muốn thay đổi một banner nào đó thì chúng ta sẽ ẩn đi các item đang hiện và mặc định phải có 1 items hiện để trang client load dữ liệu)<br/>
  -chức năng xóa, sửa
  
  <li>2.2 Thêm</li>
  -Thực hiện chức năng thêm banner
</ul>

3. *Phần Content*:<br/>
-Các chức năng hầu hết giống với banner, có thêm, xóa, sửa. <br/>
-Có thể trực tiếp thay đổi thứ tự hiện thị của từng items thông qua Display Number

