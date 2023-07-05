#### Lý thuyết lập trình hướng đối tượng OOP ###

- OOP là gì?
    + là một kỹ thuật lập trình quy toàn bộ bài toán về các đối tượng cụ thể

- Class là gì?
    + là tập hợp chứa các thuộc tính, method của các đối tượng được tạo ra từ class.

    Ví dụ: 
    class Person
    {
        // có các thuộc tính như:
        name;
        age;
        address;
        ....
    } 
    Thì các đối tượng được tạo ra từ class Person đều có các thuộc tính trên.

- Object là gì
    + là các đối tượng cụ thể được tạo ra từ class

    Ví dụ:
    $person1 = new Person;
    Đối tượng person1 được sinh ra từ class person và có đầy đủ các thuộc tính của Person

- Property, method là gì?
    + Property là các biến được khai báo ở bên trong class có thuộc tính(method) kèm theo.

    + Method quy định các phương thức truy xuất thông tin của các biến. Có các method sau: 
        * Public: có thể truy cập vào biến ở mọi nơi.

        * Protected: Không thể truy cập từ ngoài class, có thể được kế thừa bời class con

        * Private: Không thể truy cập từ ngoài class, không thể được kế thừa bời class con

        * static: có thể truy xuất từ cả trong và ngoài class 
            trong class:  static::$tênBiến
                          self::$tênBiến

            ngoài class: TênClass::$tênBiến
        
        * const: là hằng số, tồn tại duy nhất, có thể truy xuất từ cả trong và ngoài class 
            trong class:  static::$TÊNHẰNG
                          self::$TÊNHẰNG

            ngoài class: TênClass::$TÊNHẰNG

    Ví dụ: 
    class Person
    {
        public $name;
        protected $age;
        private $address;
        static $gender;
        const PHONE;
    }

- Extend dùng để kế thừa một class từ một class khác với điều kiện thuộc tính, phương thức của class cha phải ở phương thức public | protected.

    Ví dụ: 
    class Student extend Person
    {
        // Class Student sẽ được kế thừa các thuộc tính: name, age của class Person. 
    }
- Parent: chống kế thừa một thuộc tính của lớp cha 
    Chống ghi đè (orverride): parent::tênClass()

- Clone: tạo ra một bản sao độc lập của một đối tượng đang có, tránh bị ghi đè đối tượng.
    
    Ví dụ:
    $person1 = new Person("John");

    // Sao chép đối tượng
    $person2 = clone $person1;

    // Thay đổi giá trị thuộc tính của đối tượng sao chép
    $person2->name = "Jane";

    // In ra giá trị thuộc tính của cả hai đối tượng
    echo $person1->name;   // Kết quả: "John";
    echo $person2->name;   // Kết quả: "Jane";

- Trait (liên quan đến đa kế thừa): là một tính năng cho phép kế thừa từ nhiều class bằng từ khóa use + teenClass ở trong class con nhưng class cha phải đổi từ 'class' --> 'trait'

    Ví Dụ:
    trait $person
    {
        //code
    }
    class Doctor
    {
        use $person;
    }

- Final (hình thức chống kế thừa):
    Khi khai báo final trước tên một class thì không thể kế thừa class đó bằng một class khác.
    Khi khai báo final trước tên một thuộc tính của lớp cha thì thuộc tính ấy không được kế thừa ở lớp con.

    Ví dụ:

    final class Children
    {

    }

    class Son extends Children
    {
        // xuất hiện lỗi biên dịch...
    }

    class Children
    {
        final 
    }

    class Son extends Children
    {
        // xuất hiện lỗi biên dịch...
    }
- Abstract: Lớp trừu tượng, phương thức trừu tượng
    - Lớp trừu tượng là lớp có hoặc không có phương thức trừu tượng
    - Những class con kế thừa lớp trừu tượng này sẽ phải định nghĩa lại các phương thức trừu tượng của lớp trừu tượng
    
    - Connect Database (connect) : Database 
        class Database
            + connect()
        class User {
            // Sử dụng đối tượng user //  access vào database
        }

        class Product {
            // Sử dụng đối tượng Product // access vào database
        }

- __Construct(): phương thức khởi tạo, sẽ được gọi đầu tiên sau khi đối tượng của lớp được tạo ra được sử dụng để khởi tạo thuộc tính ban đầu cho đối tượng.

    Ví Dụ: 
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

- __destruct(): phương thức hủy, sẽ được gọi cuối cùng dùng để hủy kết nối đến đối tượng, giải phóng bộ nhớ

    Ví dụ:
    public function __destruct() {
        echo "Destructor called.";
    }

- Namespace: là phương thức quản lý mã nguồn, nó ngăn chặn xung đột tên lớp. Xác định phạm vi cho các thành phần code.

    Ví dụ:
    namespace Demo1

    class Example
    {

    }

    namespace Demo2

    class Example
    {
        
    }