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

This Keyword
Saat kita membuat kode di dalam function di dalam class, kita bisa menggunakan kata kunci this untuk mengakses object saat ini
Misal kadang kita butuh mengakses properties atau function lain di class yang sama

Kode : This Keyword
 function sayHello(?string $name)
    {
        if (is_null($name)) {
            echo "Hi, my name is $this->name" . PHP_EOL;
        } else {
            echo "Hi $name, my name is $this->name" . PHP_EOL;
        }
    }

Constant
Properties di class bisa diubah, mirip seperti variable
Di class juga kita membuat constant, data yang tidak bisa diubah
Di materi PHP Dasar, kita belajar untuk membuat constant itu perlu menggunakan function define()
Namun sejak PHP 7.4, kita bisa menggunakan kata kunci const untuk membuat constant, mirip seperti variable, namun tidak menggunakan karakter $

Kode : Constant
require_once "data/Person.php";

define("APPLICATION", "Belajar PHP OOP");
const APP_VERSION = "1.0.0";

echo APPLICATION . PHP_EOL;
echo APP_VERSION . PHP_EOL;
echo Person::AUTHOR . PHP_EOL;

Kode : Constant di Class
const AUTHOR = "Programmer Zaman Now";

Kode : Mengakses Constant di Class
echo Person::AUTHOR . PHP_EOL;

self Keyword
Properties vs Constant
Saat kita membuat object, properties yang terdapat di class akan secara otomatis dibuat per object, oleh karena itu untuk mengakses properties, kita perlu menggunakan object, atau jika dari dalam object tersebut sendiri, kita perlu menggunakan kata kunci this
Sedangkan berbeda dengan constant, constant di class tidak akan dibuat per object. Constant itu hidupnya di class, bukan di object, oleh karena itu untuk mengaksesnya kita perlu menggunakan NamaClass::NAMA_CONSTANT
Secara sederhana, properties akan dibuat satu per instance class (object), sedangkan constant dibuat satu per class

self Keyword
Jika di dalam class (misal di function) kita ingin mengakses constant, kita perlu mengakses menggunakan NamaClass::NAMA_CONSTANT
Namun jika di dalam class yang sama, kita bisa menggunakan kata kunci self untuk mempermudah

Kode : self Keyword

class Person {
    function info()
    {
        echo "Author : " . self::AUTHOR . PHP_EOL;
    }
}

$eko->info();
$joko->info();

Constructor
Saat kita membuat Object, maka kita seperti memanggil sebuah function, karena kita menggunakan kurung ()
Di dalam class PHP, kita bisa membuat constructor, constructor adalah function  yang akan dipanggil saat pertama kali Object dibuat.
Mirip seperti di function, kita bisa memberi parameter pada constructor
Nama constructor di PHP haruslah __construct()

Kode : Membuat Constructor
class Person
{
    const AUTHOR = "Programmer Zaman Now";

    var string $name;
    var ?string $address = null;
    var string $country = "Indonesia";

    function __construct(string $name, ?string $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

Kode : Menggunakan Constructor

<?php

require_once "data/Person.php";

$eko = new Person("Eko", "Subang");

var_dump($eko);

Destructor
Jika constructor adalah function yang akan dipanggil ketika object dibuat
Destructor adalah function yang akan dipanggil ketika object dihapus dari memory
Biasanya ketika object tersebut sudah tidak lagi digunakan, atau ketika aplikasi akan mati
Untuk membuat function destructor, kita bisa menggunakan nama function __destruct()
Khusus untuk destructor, kita tidak boleh menambahkan function argument
Dalam penggunaan sehari-hari, ini misal cocok untuk menutup koneksi ke database atau menutup proses menulis ke file, sehingga tidak terjadi memory leak

Kode : Destructor
function __destruct()
    {
        echo "Object person $this->name is destroyed" . PHP_EOL;
    }

require_once "data/Person.php";

$eko = new Person("Eko", "Subang");
$joko = new Person("Joko", "Subang");

echo "Program Selesai" . PHP_EOL;

Inheritance
Inheritance atau pewarisan adalah kemampuan untuk menurunkan sebuah class ke class lain
Dalam artian, kita bisa membuat class Parent dan class Child
Class Child, hanya bisa punya satu class Parent, namun satu class Parent bisa punya banyak class Child
Saat sebuah class diturunkan, maka semua properties dan function yang ada di class Parent, secara otomatis akan dimiliki oleh class Child
Untuk melakukan pewarisan, di class Child, kita harus menggunakan kata kunci extends lalu diikuti dengan nama class parent nya.

Kode : Inheritance
class Manager
{
    var string $name;

    var string $title;

    public function __construct(string $name = "", string $title = "Manager")
    {
        $this->name = $name;
        $this->title = $title;
    }

    function sayHello(string $name): void
    {
        echo "Hi $name, my name is Manager $this->name" . PHP_EOL;
    }
}

class VicePresident extends Manager
{

    public function __construct(string $name = "")
    {
        // tidak wajib, tapi direkomendasikan
        parent::__construct($name, "VP");
    }

    function sayHello(string $name): void
    {
        echo "Hi $name, my name is VP $this->name" . PHP_EOL;
    }
}

Kode : Mengakses Method Parent
require_once "data/Manager.php";

$manager = new Manager();
$manager->name = "Budi";
$manager->sayHello("Joko");

$vp = new VicePresident();
$vp->name = "Eko";
$vp->sayHello("Joko");

Namespace
Saat kita membuat aplikasi, bisa dipastikan kita akan banyak sekali membuat class
Jika class terlalu banyak, kadang akan menyulitkan kita untuk mencari atau mengklasifikasikan jenis-jenis class
PHP memiliki fitur namespace, dimana kita bisa menyimpan class-class kita di dalam namespace
Namespace bisa nested, dan jika kita ingin mengakses class yang terdapat di namespace, kita perlu menyebutkan nama namespace nya
Namespace bagus ketika kita punya beberapa class yang sama, dengan menggunakan namespace nama class sama tidak akan menjadikan error di PHP

Membuat Namespace
Untuk membuat namespace, kita bisa menggunakan kata kunci namespace
Jika kita ingin membuat sub namespace, kita cukup gunakan karakter \ setelah namespace sebelumnya

Kode : Membuat Namespace
namespace Data\One {
    class Conflict
    {
    }

    class Sample
    {
    }

    class Dummy
    {
    }
}

namespace Data\Two {
    class Conflict
    {
    }
}

Kode : Membuat Object dari Namespace
require_once "data/Conflict.php";
    require_once "data/Helper.php";

    $conflict1 = new Data\One\Conflict();
    $conflict2 = new Data\Two\Conflict();

Function dan Constant di Namespace
Selain class, kita juga menggunakan function dan constant di namespace
Dan jika kita ingin menggunakan function atau constant tersebut, kita bisa menggunakannya dengan diawali dengan nama namespace nya

Kode : Function dan Constant di Namespace
namespace Helper;

function helpMe()
{
    echo "HELP ME" . PHP_EOL;
}

const APPLICATION = "Belajar PHP OOP";

Global Namespace
Secara default saat kita membuat kode di PHP sebenarnya itu disimpan di global namespace
Global namespace adalah namespace yang tidak memiliki nama namespace

Kode : Global Namespace
namespace {

    require_once "data/Conflict.php";
    require_once "data/Helper.php";

    $conflict1 = new Data\One\Conflict();
    $conflict2 = new Data\Two\Conflict();

    echo Helper\APPLICATION . PHP_EOL;

    Helper\helpMe();
}

Import

use Keyword
Sebelumnya kita sudah tahu bahwa untuk menggunakan class, function atau constant di namespace kita perlu menyebutkan nama namespace nya di awal
Jika terlalu sering menggunakan class, function atau constant yang sama, maka terlalu banyak duplikasi dengan menyebut namespace yang sama berkali-kali
Hal ini bisa kita hindari dengan cara mengimport class, function atau constant tersebut dengan menggunakan kata kunci use

Kode : use Keyword
require_once "data/Conflict.php";
require_once "data/Helper.php";

use Data\One\Conflict;
use function Helper\helpMe;
use const Helper\APPLICATION;

$conflict1 = new Conflict();
$conflict2 = new Data\Two\Conflict();

helpMe();

echo APPLICATION . PHP_EOL;

Alias
Saat kita menggunakan use, artinya kita tidak perlu lagi menggunakan nama namespace diawal class ketika kita ingin membuat class tersebut
Namun bagaimana jika kita ternyata nama class nya sama?
Untungnya PHP memiliki fitur yang namanya alias
Alias adalah kemampuan membuat nama lain dari class, function atau constant yang ada
Kita bisa menggunakan kata kunci as setelah melakukan use

Kode : Alias
require_once "data/Conflict.php";
require_once "data/Helper.php";

use Data\One\Conflict as Conflict1;
use Data\Two\Conflict as Conflict2;
use function Helper\helpMe as help;
use const Helper\APPLICATION as APP;

$conflict1 = new Conflict1();
$conflict2 = new Conflict2();

help();

echo APP . PHP_EOL;

Group use Declaration
Kadang kita butuh melakukan import banyak hal di satu namespace yang sama
PHP memiliki fitur grup use, dimana kita bisa import beberapa class, function atau constant dalam satu perintah use
Untuk melakukan itu, kita bisa menggunakan kurung { } 

Kode : Group use Declaration
require_once "data/Conflict.php";
require_once "data/Helper.php";

use Data\One\{Conflict as Conflict1, Dummy, Sample};
use function Helper\{helpMe};

$conflict = new Conflict1();
$dummy = new Dummy();
$sample = new Sample();

Visibility
Visibility / Access modifier adalah kemampuan properties, function dan constant dapat diakses dari mana saja
Secara default, properties, function dan constant yang kita buat di dalam class bisa diakses dari mana saja, atau artinya dia adalah public
Selain public, masih ada beberapa visibility lainnya
Secara default kata kunci var untuk properties adalah sifatnya public

Access Level
 Modifier
Class
Subclass
World
public
Y
Y
Y
protected
Y
Y
N
private
Y
N
N

Kode : Class Product
class Product
{
    protected string $name;
    protected int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class ProductDummy extends Product
{

    public function info()
    {
        echo "Name $this->name" . PHP_EOL;
        echo "Price $this->price" . PHP_EOL;
    }
}

Kode : Menggunakan Product
require_once "data/Product.php";

$product = new Product("Apple", 20000);

echo $product->getName() . PHP_EOL;
echo $product->getPrice() . PHP_EOL;

$dummy = new ProductDummy("Dummy", 1000);
$dummy->info();




*/