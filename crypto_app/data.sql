-- ============================================
-- DATABASE: manajemen_crypto
-- ============================================

CREATE DATABASE IF NOT EXISTS manajemen_crypto;
USE manajemen_crypto;

-- ============================================
-- TABLE: USERS
-- ============================================

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- TABLE: CRYPTO ASSETS
-- ============================================

CREATE TABLE crypto_assets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    simbol VARCHAR(20) NOT NULL,
    nama_crypto VARCHAR(100) NOT NULL,
    harga DECIMAL(20,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- TABLE: WALLETS
-- ============================================

CREATE TABLE wallets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    saldo DECIMAL(20,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- ============================================
-- TABLE: TRANSACTIONS
-- ============================================

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    crypto_id INT,
    tipe ENUM('buy','sell') NOT NULL,
    jumlah DECIMAL(20,8) NOT NULL,
    harga DECIMAL(20,2) NOT NULL,
    total DECIMAL(20,2) NOT NULL,
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (crypto_id) REFERENCES crypto_assets(id)
);

-- ============================================
-- TABLE: CRYPTO PRICE HISTORY
-- ============================================

CREATE TABLE crypto_prices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    crypto_id INT,
    harga DECIMAL(20,2) NOT NULL,
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (crypto_id) REFERENCES crypto_assets(id) ON DELETE CASCADE
);

-- ============================================
-- TABLE: LOGIN LOGS (optional)
-- ============================================

CREATE TABLE login_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    ip_address VARCHAR(50),
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- ============================================
-- SEEDER DATA (DATA AWAL)
-- ============================================

INSERT INTO users (nama,email,password,role) VALUES
('Admin','admin@crypto.com','123456','admin'),
('User1','user1@crypto.com','123456','user');

INSERT INTO crypto_assets (simbol,nama_crypto,harga) VALUES
('BTC','Bitcoin',850000000),
('ETH','Ethereum',45000000),
('BNB','Binance Coin',8500000);

INSERT INTO wallets (user_id,saldo) VALUES
(1,1000000000),
(2,500000000);

INSERT INTO transactions (user_id,crypto_id,tipe,jumlah,harga,total) VALUES
(2,1,'buy',0.01,850000000,8500000);
