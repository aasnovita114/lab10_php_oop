# lab10_php_oop

<table>
  <tr>
    <th colspan="2">DATA MAHASISWA</th>
  </tr>
  <tr>
    <td>Nama</td>
    <td>Aas Novitasari</td>
  </tr>
  <tr>
    <td>NIM</td>
    <td>312210167</td>
  </tr>
  <tr>
    <td>Kelas</td>
    <td>TI.22.A1</td>
  </tr>
</table>

## Tujuan
1. Mahasiswa mampu memahami konsep dasar OOP.
2. Mahasiswa mampu memahami konsep dasar Class dan Object.
3. Mahasaswa mampu membuat program OOP sederhana menggunakan PHP.
   
## Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buat folder baru dengan nama lab10_php_oop pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.

## Langkah-langkah Praktikum
Buat file baru dengan nama mobil.php
```
<?php
/**
* Program sederhana pendefinisian class dan pemanggilan class.
**/

class Mobil
{
    private $warna;
    private $merk;
    private $harga;

    public function __construct()
    {
        $this->warna = "Biru";
        $this->merk = "BMW";
        $this->harga = "10000000";
    }

    public function gantiWarna ($warnaBaru)
    {
        $this->warna = $warnaBaru;
    }
    public function tampilWarna ()
    {
        echo "Warna mobilnya : " . $this->warna;
    }
}

// membuat objek mobil
$a = new Mobil();
$b = new Mobil();

// memanggil objek
echo "<b>Mobil pertama</b><br>";
$a->tampilWarna();
echo "<br>Mobil pertama ganti warna<br>";
$a->gantiWarna("Merah");
$a->tampilWarna();

// memanggil objek
echo "<br><b>Mobil kedua</b><br>";
$b->gantiWarna("Hijau");
$b->tampilWarna();
?>
```
![Screenshot 2023-12-05 105146](https://github.com/aasnovita114/lab10_php_oop/assets/116045324/a2475cac-8ff1-4228-b384-c996c599e9c2)


- **Class Library**
Class Library merupakan pustaka kode program yang dapat digunakan bersama pada beberapa file yang berbeda (konsep modularisasi). Class library menyimpan fungsi-fungsi atau class object komponen untuk memudahkan dalam proses development aplikasi.

2. Buat file php baru dengan nama `form.php`
```
<?php
/**
 * Nama Class: Form
 * Deskripsi: Class untuk membuat form inputan text sederhana
 */

class Form
{
    private $fields = array();
    private $action;
    private $submit = "Submit Form";
    private $jumField = 0;
    public function __construct($action, $submit)
    {
        $this->action = $action;
        $this->submit = $submit;
    }
    public function displayForm()
    {
        echo "<form action='" . $this->action . "' method='POST'>";
        echo '<table width="100%" border="0">';
        for ($j = 0; $j < count($this->fields); $j++) {
            echo "<tr><td
    align='right'>" . $this->fields[$j]['label'] . "</td>";
            echo "<td><input type='text'
    name='" . $this->fields[$j]['name'] . "'></td></tr>";
        }
        echo "<tr><td colspan='2'>";
        echo "<input type='submit' value='" . $this->submit . "'></td></tr>";
        echo "</table>";
    }

    public function addField($name, $label)
    {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->jumField++;
    }

}
?>
```

3. Buat file php baru dengan nama `form_input.php`
```
<?php
/**
* Program memanfaatkan Program 10.2 untuk membuat form inputan sederhana.
**/
include "form.php";
echo "<html><head><title>Mahasiswa</title></head><body>";
$form = new Form("","Input Form");
$form->addField("txtnim", "Nim");
$form->addField("txtnama", "Nama");
$form->addField("txtalamat", "Alamat");
echo "<h3>Silahkan isi form berikut ini :</h3>";
$form->displayForm();
echo "</body></html>";
?>
```
> Output :
![Screenshot 2023-12-26 191958](https://github.com/aasnovita114/lab10_php_oop/assets/116045324/437db00f-a7ef-4f86-961f-8c7ec8df6b13)


4. Buat file dengan nama `database.php`
```
<?php

class Database
{
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct()
    {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig()
    {
        include_once("config.php");
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];
    }
    
    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null)
    {
        if ($where) {
            $where = " WHERE " . $where;
        }
        $sql = "SELECT * FROM " . $table . $where;
        $sql = $this->conn->query($sql);
        $sql = $sql->fetch_assoc();
        return $sql;
    }

    public function insert($table, $data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $column[] = $key;
                $value[] = "'{$val}'";
            }
            $columns = implode(",", $column);
            $values = implode(",", $value);
        }
        $sql = "INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $values . ")";
        $sql = $this->conn->query($sql);
        if ($sql == true) {
            return $sql;
        } else {
            return false;
        }
    }

    public function update($table, $data, $where)
    {
        $update_value = "";
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $update_value[] = "$key='{$val}'";
            }
            $update_value = implode(",", $update_value);
        }

        $sql = "UPDATE " . $table . " SET " . $update_value . " WHERE " . $where;
        $sql = $this->conn->query($sql);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }


    public function delete($table, $filter)
    {
        $sql = "DELETE FROM " . $table . " " . $filter;
        $sql = $this->conn->query($sql);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }
}
?>
```

## Pertanyaan dan tugas
1. Membuat file `config.php`
   [config.php](lab10_tugas/config.php)

3. Membuat file `database.php`
   [database.php](lab10_tugas/database.php)

5. Membuat file `formlibrary.php`
   [formlibrary.php](lab10_tugas/formlibrary.php)

7. Konfigurasikan dengan praktikum sebelumnya
   [index.php](lab10_tugas/index.php)
   [tambah.php](lab10_tugas/tambah.php)
   [ubah.php](lab10_tugas/ubah.php)
   [hapus.php](lab10_tugas/hapus.php)

-> **Output Tugas :**

> - `Home.php`
![Screenshot 2023-12-27 092112](https://github.com/aasnovita114/lab10_php_oop/assets/116045324/26f0ac0b-3332-41c1-9fe3-442aeb4035af)



> - `About.php`
![Screenshot 2023-12-27 092428](https://github.com/aasnovita114/lab10_php_oop/assets/116045324/8e8f97a4-f8e9-4259-804d-0f87aab851a0)


> - `Kontak.php`
![Screenshot 2023-12-26 193929](https://github.com/aasnovita114/lab10_php_oop/assets/116045324/8cbbadd5-f5dc-4c93-b0c3-ac46daa6491b)


> - `tambah.php`
![Screenshot 2023-12-27 092758](https://github.com/aasnovita114/lab10_php_oop/assets/116045324/e2e67ab6-d41d-48c9-bd5e-6e44b1bbe024)

![Screenshot 2023-12-27 092810](https://github.com/aasnovita114/lab10_php_oop/assets/116045324/2e2ee440-226f-4ec4-82bb-4733cba51313)



> - `ubah.php`
![Screenshot 2023-12-27 092849](https://github.com/aasnovita114/lab10_php_oop/assets/116045324/be5fe87f-5125-4db2-ac47-7683726a8193)

![Screenshot 2023-12-27 092900](https://github.com/aasnovita114/lab10_php_oop/assets/116045324/a558a47a-5db0-4418-8bbb-d9f4cc574cc7)




> - `hapus.php`
![Screenshot 2023-12-27 092936](https://github.com/aasnovita114/lab10_php_oop/assets/116045324/86cb3ec7-eb10-4564-9d53-a514b701d54f)



## Selesai, Terima Kasih
