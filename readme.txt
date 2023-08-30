Intruksi Cara Menjalankan & Menggunakan Mini-Project

1. Sudah Menginstall xampp

2. Masukan Folder "Mini-Project" kedalam folder "\htdocs" yang berada didalam folder xampp
   (path : D:\xampp\htdocs\Mini-Project)

3. Jalankan Xampp Control Panel lalu pencet "Start" pada bagian "Apache" dan "MySQL", kemudian ketik "localhost/phpmyadmin/"
   pada Browser anda atau bisa juga memencet tombol "Admin" di XAMPP Control Panel pada bagian "MySQL"

4. Lalu pada phpmyadmin buat Database baru dengan nama "db_project_hikaru" (note : Perhatikan besar kecilnya huruf)

5. kemudian masuk ke Database yang sudah di buat, lalu pilih Tab Import, kemudian pada bagian "File to import"
   pilih File Database "db_project_hikaru" yang berada di dalam folder "Mini-Project"

6. Masuk ke Terminal lalu masuk ke dalam path "CRUD-Project" yang berada di dalam folder "Mini-Project' dengan cara menggunakan Command "cd"
   ("cd D:" enter
    "cd xampp" enter
    "cd htdocs" enter
    "cd Mini-Project" enter
    "cd CRUD-Project" enter)
   Maka pathnya akan menjadi "D:\xampp\htdocs\Mini-Projec\CRUD-Project"
   Note : Jika Path Terminal berada di "C:\..." untuk keluar dari Directory tersebut menggunakan Command "cd.." lalu enter
   (contoh kasus : "C\Users\Nama" maka jika menggunakan "cd.." lalu enter akan menjad "C:\Users" lalu lakukan kembali Command "cd.."
   sampai tersisa "C:\" lalu langsung  ketik "D:" enter maka Path akan berubah menjadi "D:\"

7. Setelah Path sudah di "CRUD-Project" ketikan "php artisan serve" lalu enter.

8. Tunggu sampai Link LocalHost muncul dan buka link tersebut di Browser

9. Setelah itu di Browser akan muncul tampilan Welcome dari Laravel, silahkan tambahkan "/project" pada URL di Browser tersebut
   (contoh url : 127.0.0.1:8000/project)

10. Dan setelah itu akan tampil Hasil dari Project saya