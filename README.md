## Praktikum Berbasis Framework

HI, I'm Khidir<br/>
In this task I was backend web developer using CodeIgniter. This is a mahasiswa application for taking permition. Here let me give you can access this CI easily and it was including sql and also explanation for each steps.

### 1. Clone Repository

Clone the repository into your folder:

```bash
git clone https://github.com/khidir05/backend_kelompok3
```

### 2. Install dependencies

Install composer to add dependencies that this project need:

```bash
composer install
```

### 3. Environment configuration

You may copy your the env in root folder then rename env_copy with .env or by using this prompt:

```bash
cp .env.example .env
```

Edit .env on yours following codes below by your database's name:

```ini
database.default.hostname = localhost
database.default.database = nama_database_anda
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

### 4. Create database and import data dummies

* Create your database on your sql and give it names _(For creeate and adding a database into your sql, it will be easily using command line even you need process to get access for your sql. need to know that's **my manner**, you may **by yours**)_
  ```cmd
  create database your_db_example;
  use your_db_example;
  ```
* Import file SQL berikut ke dalam database tersebut:

```sql
-- ----------------------------
-- Table structure for jurusan
-- ----------------------------
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan`  (
  `id_jurusan` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_jurusan`, `nama`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jurusan
-- ----------------------------
INSERT INTO `jurusan` VALUES ('JKB', 'Jurusan Komputer dan Bisnis');
INSERT INTO `jurusan` VALUES ('JREM', 'Jurusan Rekayasa Elektro dan Mekatronika');
INSERT INTO `jurusan` VALUES ('JRMIP', 'Jurusan Rekayasa Mesin dan Industri Pertanian');

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `NIM` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kelas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `semester` int NOT NULL,
  `tahun_akademik` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_prodi` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`NIM`) USING BTREE,
  INDEX `fk_mhs`(`id_prodi` ASC) USING BTREE,
  CONSTRAINT `fk_mhs` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES ('220104011', 'Hanif Maulana Azidan', 'TPPL 3 A', 6, '2022/2023', 'Cuti', '04TP');
INSERT INTO `mahasiswa` VALUES ('220302008', 'Dewi Putria Ayu', 'TI 3 C', 6, '2022/2023', 'Aktif', '04TP');
INSERT INTO `mahasiswa` VALUES ('230101003', 'Budi Santoso', 'TM 2 B', 4, '2023/2024', 'Aktif', '01M');
INSERT INTO `mahasiswa` VALUES ('230305054', 'Septiana Raisa', 'PPA 2 A', 4, '2023/2024', 'Cuti', '05PPA');
INSERT INTO `mahasiswa` VALUES ('240203032', 'Ani Wulandari', 'TPPL 1 C', 2, '2024/2025', 'Aktif', '04TP');

-- ----------------------------
-- Table structure for pengajuan
-- ----------------------------
DROP TABLE IF EXISTS `pengajuan`;
CREATE TABLE `pengajuan`  (
  `id_pengajuan` int NOT NULL AUTO_INCREMENT,
  `NIM` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kelas` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `semester` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `semester_cuti` int NOT NULL,
  `tgl_mulai_cuti` date NOT NULL,
  `tgl_selesai_cuti` date NOT NULL,
  `alasan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dokumen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status_pengajuan` enum('Disetujui','Menunggu','Ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tgl_persetujuan` date NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  PRIMARY KEY (`id_pengajuan`) USING BTREE,
  UNIQUE INDEX `NIM`(`NIM` ASC, `semester_cuti` ASC) USING BTREE,
  CONSTRAINT `fk_mahasiswa` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengajuan
-- ----------------------------
INSERT INTO `pengajuan` VALUES (9, '220104011', 'Hanif Maulana Azidan', 'TPPL 3 A', '6', '2025-02-26', 7, '2025-08-01', '2026-02-11', 'bekerja', 'h', 'Disetujui', '2025-03-06', NULL);
INSERT INTO `pengajuan` VALUES (10, '220302008', 'Dewi Putria Ayu', 'TI 3 C', '6', '2025-02-04', 6, '2025-04-30', '2025-06-30', 'sakit', 'j', 'Ditolak', NULL, NULL);
INSERT INTO `pengajuan` VALUES (11, '230305054', 'Septiana Raisa', 'PPA 2 C', '4', '2025-02-26', 4, '2025-03-01', '2025-04-30', 'bekerja', 'k', 'Disetujui', '2025-03-05', NULL);
INSERT INTO `pengajuan` VALUES (12, '240203032', 'Ani Wulandari', 'TPPL 1 C', '2', '2025-01-01', 3, '2025-02-01', '2025-08-01', 'hjk', 'y', 'Disetujui', '2025-02-26', NULL);

-- ----------------------------
-- Table structure for prodi
-- ----------------------------
DROP TABLE IF EXISTS `prodi`;
CREATE TABLE `prodi`  (
  `id_prodi` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_jurusan` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_prodi`) USING BTREE,
  INDEX `fk_jurusan`(`id_jurusan` ASC) USING BTREE,
  CONSTRAINT `fk_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prodi
-- ----------------------------
INSERT INTO `prodi` VALUES ('01M', 'D3 Teknik Mesin', 'JRMIP');
INSERT INTO `prodi` VALUES ('02I', 'D3 Teknik Informatika', 'JKB');
INSERT INTO `prodi` VALUES ('03L', 'D3 Teknik Listrik', 'JREM');
INSERT INTO `prodi` VALUES ('04TP', 'D4 Teknik Pengendalian Pencemaran Lingkungan', 'JRMIP');
INSERT INTO `prodi` VALUES ('05PPA', 'D4 Pengembangan Produk', 'JRMIP');

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff`  (
  `NIP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('23ASS', 'Hariyanto', 'Ketua Akademik');
INSERT INTO `staff` VALUES ('42BSS', 'Dwi Gayatri ', 'Staff Akademik');
INSERT INTO `staff` VALUES ('26ASF', 'Sulistiyo', 'Staff Akademik');

-- ----------------------------
-- View structure for pengajuancutiaktif
-- ----------------------------
DROP VIEW IF EXISTS `pengajuancutiaktif`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `pengajuancutiaktif` AS select `pengajuan`.`id_pengajuan` AS `id_pengajuan`,`pengajuan`.`NIM` AS `NIM`,`pengajuan`.`nama` AS `nama`,`pengajuan`.`kelas` AS `kelas`,`pengajuan`.`semester` AS `semester`,`pengajuan`.`tgl_pengajuan` AS `tgl_pengajuan`,`pengajuan`.`semester_cuti` AS `semester_cuti`,`pengajuan`.`tgl_mulai_cuti` AS `tgl_mulai_cuti`,`pengajuan`.`tgl_selesai_cuti` AS `tgl_selesai_cuti`,`pengajuan`.`alasan` AS `alasan`,`pengajuan`.`status` AS `status` from `pengajuan` where ((`pengajuan`.`status` = 'Menunggu') or (`pengajuan`.`status` = 'Disetujui'));
```

### 5. Run your server

```bash
php spark serve
```

Server will run at `http://localhost:8080`

### 6. Check endpoint API using postman

Using API's tester like _postman_ or _apidog_ then add collection for each goals for make it easily and tidy then add request for each API request on every collection:

#### Mahasiswa

* `GET` → `http://localhost:8080/api/mahasiswa` ***Get all data mahasiswas***
* `POST` → `http://localhost:8080/api/mahasiswa/login` ***Login access using mahasiswa***
* `GET` → `http://localhost:8080/api/mahasiswa/{id}` ***Get one data mahasiswa (usually for dashborad, his information, etc)***
* `POST` → `http://localhost:8080/api/mahasiswa` ***Add data mahasiswa***
* `PUT` → `http://localhost:8080/api/mahasiswa/{id}` ***Edit data mahasiswa***
* `DELETE` → `http://localhost:8080/api/mahasiswa/{id}` ***Delete data mahasiswa***

  #### Staff

* `GET` → `http://localhost:8080/api/staff` ***Get all data staffs***
* `POST` → `http://localhost:8080/api/staff/login` ***Login access using staff***
* `GET` → `http://localhost:8080/api/staff/{id}` ***Get one data staff (usually for dashborad, his information, etc)***
* `POST` → `http://localhost:8080/api/staff` ***Add data staff***
* `PUT` → `http://localhost:8080/api/staff/{id}` ***Edit data staff***
* `DELETE` → `http://localhost:8080/api/staff/{id}` ***Delete data staff***

  #### Jurusan

* `GET` → `http://localhost:8080/api/jurusan` ***Get all data jurusans***
* `GET` → `http://localhost:8080/api/jurusan/{id}` ***Get one data jurusan (we provide this for your necessary)***
* `POST` → `http://localhost:8080/api/jurusan` ***Add data jurusan***
* `PUT` → `http://localhost:8080/api/jurusan/{id}` ***Edit data jurusan***
* `DELETE` → `http://localhost:8080/api/jurusan/{id}` ***Delete data jurusan***

  #### Prodi

* `GET` → `http://localhost:8080/api/prodi` ***Get all data prodi***
* `GET` → `http://localhost:8080/api/prodi/{id}` ***Get one data prodi (we provide this for your necessary)***
* `POST` → `http://localhost:8080/api/prodi` ***Add data prodi***
* `PUT` → `http://localhost:8080/api/prodi/{id}` ***Edit data prodi***
* `DELETE` → `http://localhost:8080/api/prodi/{id}` ***Delete data prodi***

#### Pengajuan

* `GET` → `http://localhost:8080/api/pengajuan` ***Get all data pengajuans***
* `POST` → `http://localhost:8080/api/pengajuan` ***Add data pengajuan***
* `PUT` → `http://localhost:8080/api/pengajuan/{id}` ***Edit data pengajuan (this is like the pengajuan/ applicant is approved or declined)***

If you have problem please contact me in my bio 
