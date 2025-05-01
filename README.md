# 🔐 Secure Password Generator

A robust command-line tool for generating cryptographically secure passwords and saving them to encrypted files.

## 🚀 Features
- ✅ Generates high-entropy passwords (16-4096 chars)
- 🔒 Automatically saves to permission-restricted files (chmod 600)
- 🛡️ Uses multiple cryptographic methods:
  - `random_bytes()` (CSRNG)
  - SHA-256 hashing
  - Base64 encoding
- 🧹 Secure memory cleanup

## 🛠️ Usage
```bash
php passwordManager.php <filename> <length>
