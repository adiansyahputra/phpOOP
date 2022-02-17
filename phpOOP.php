<?php 
/*
Apa itu Object?
Object adalah data yang berisi field / properties / attributes dan method / function / behavior

Apa itu Class?
Class adalah blueprint, prototype atau cetakan untuk membuat Object
Class berisikan deklarasi semua properties dan functions yang dimiliki oleh Object
Setiap Object selalu dibuat dari Class
Dan sebuah Class bisa membuat Object tanpa batas

Class dan Object : Person
http://www.plantuml.com/plantuml/uml/TP7DQeGm4CVlynI3f_RW2nHQn59QUf12ds3KgH_632Jn86NVVMVPoBgH5Hp8x_-Ha1G-a0lBR00QGzxZ3pil5ly1zViDRh0T_WtEXufctaD3H-Pf_M9Zv2ckhUhFYU5Jf2rNlhUS0AGUkGd8au3--7BR5Lyn-vWaYznGWhVeA9hLSGX_YzfKESIhfNFIxohgfHtWCjAAKbcsAMa5zQGLyURo_0sl1trtJ87tV9G7GYoE0XHiMtsJCm00

Class dan Object : Car
http://www.plantuml.com/plantuml/uml/NP312i8m44Jl-Oeb9ptq1mIbKWGldXGyRzjG8ib6qbImuh_RR4jIp27BliaCGye-e0-3DQ8nsFTGeOUFWEbSWzVK0Q5LwxtsI2q3TfweqwGssuMuPm9V8LpzK4q0V26DAEO1Euw4FSWZ0va5pexApRrTG9aJZCLHyBtsnrqcdDptmKnDizkwMXljn39N2PUPo2pbbBEZDbQ8Fr8K1yXFAgymg2Ia-l-SUoLSAce7Qtu0

Membuat Class
Untuk membuat class, kita bisa menggunakan kata kunci class
Penamaan class biasa menggunakan format CamelCase

Kode : Class
class Person
{
}

Membuat Object
Object adalah hasil instansiasi dari sebuah class
Untuk membuat object kita bisa menggunakan kata kunci new, dan diikuti dengan nama Class dan kurung ()

Kode : Object
require_once "data/Person.php";

$person = new Person();

var_dump($person);

Properties
Fields / Properties / Attributes adalah data yang bisa kita sisipkan di dalam Object
Namun sebelum kita bisa memasukkan data di fields, kita harus mendeklarasikan data apa aja yang dimiliki object tersebut di dalam deklarasi class-nya
Membuat field sama seperti membuat variable, namun ditempatkan di block class, namun diawali dengan kata kunci var

Kode : Properties
class Person
{
    var string $name;
    var ?string $address = null;
    var string $country = "Indonesia";
}

Manipulasi Properties
Fields yang ada di object, bisa kita manipulasi. 
Untuk memanipulasi data field, sama seperti cara pada variable
Untuk mengakses field, kita butuh kata kunci -> setelah nama object dan diikuti nama fields nya

Kode : Manipulasi Properties
require_once "data/Person.php";

$person = new Person("Eko", "Subang");
$person->name = "Eko";
$person->address = "Subang";

var_dump($person);

echo "Name : $person->name" . PHP_EOL;
echo "Address : $person->address" . PHP_EOL;
echo "Country : $person->country" . PHP_EOL;

Properties Type Declaration
Sama seperti di function, di properties pun, kita bisa membuat type declaration
Ini membuat PHP otomatis mengecek tipe data yang sesuai dengan type declaration yang telah ditentukan
Jika kita mencoba mengubah properties dengan type yang berbeda, maka otomatis akan error
Ingat, bahwa PHP memiliki fitur type juggling, yang secara otomatis bisa mengkonversi ke tipe data lain
Untuk menambahkan type declaration, kita bisa tambahkan setelah kata kunci var di properties

Kode : Properties dengan Type
    var string $name;
    var ?string $address = null;
    var string $country = "Indonesia";

Default Properties Value
Sama seperti variable, di properties juga kita bisa langsung mengisi value nya
Ini mirip seperti default value, jadi jika tidak diubah di object, maka properties akan memiliki value tersebut

Kode : Properties Default Value
    var string $country = "Indonesia";

Nullable Properties
Saat kita menambah type declaration di properties atau di function argument, maka secara otomatis kita tidak bisa mengirim data null ke dalam properties atau function argument tersebut
Di PHP 7.4 dikenalkan nullable type, jadi kita bisa mengirim data null ke properties atau function arguments
Caranya sebelum type declaration nya, kita bisa tambahkan tanda ?

Kode : Nullable Properties
    var ?string $address = null;

Function
Selain menambahkan properties, kita juga bisa menambahkan function ke object
Cara dengan mendeklarasikan function tersebut di dalam block class
Sama seperti function biasanya, kita juga bisa menambahkan return value dan parameter
Untuk mengakses function tersebut, kita bisa menggunakan tanda -> dan diikuti dengan nama method nya. Sama seperti mengakses properties

Kode : Function
function sayHello(?string $name)
    {
        if (is_null($name)) {
            echo "Hi, my name is $this->name" . PHP_EOL;
        } else {
            echo "Hi $name, my name is $this->name" . PHP_EOL;
        }
    }

Kode : Memanggil Function
require_once "data/Person.php";

$eko = new Person("Eko", "Subang");
$eko->name = "Eko";
$eko->sayHello("Budi");

$joko = new Person("Joko", "Cirebon");
$joko->name = "Joko";
$joko->sayHello(null);

$eko->info();
$joko->info();


*/