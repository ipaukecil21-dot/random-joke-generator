# Security Policy

## Supported Versions

Kami merilis patch untuk versi berikut:

| Version | Supported          |
| ------- | ------------------ |
| 1.0.x   | :white_check_mark: |
| < 1.0   | :x:                |

## Reporting a Vulnerability

Kami menghargai laporan keamanan yang bertanggung jawab. Jika Anda menemukan kerentanan keamanan, silakan laporkan melalui email ke **security@example.com** daripada menggunakan issue tracker publik.

### Proses Pelaporan

1. **Jangan buat issue publik** untuk vulnerability yang dilaporkan
2. Kirim email ke security@example.com dengan:
   - Deskripsi kerentanan
   - Langkah-langkah untuk mereproduksi
   - Dampak potensial
   - Saran perbaikan (jika ada)

3. Tim kami akan:
   - Mengkonfirmasi penerimaan laporan dalam 24 jam
   - Menginvestigasi dan mengkonfirmasi vulnerability
   - Bekerja pada patch
   - Merilisnya segera mungkin

### Disclosure Timeline

- **Hari 0**: Laporan diterima dan dikonfirmasi
- **Hari 1-3**: Investigasi awal dan verifikasi
- **Hari 3-7**: Pengembangan patch
- **Hari 7-14**: Testing dan release patch
- **Hari 14**: Pengumuman publik (setelah patch dirilis)

## Security Best Practices

Ketika menggunakan Random Joke Generator, ikuti praktik terbaik ini:

- **Update Teratur**: Selalu gunakan versi terbaru
- **Validasi Input**: Validasi semua input dari pengguna
- **Secure API Keys**: Jaga API keys tetap rahasia, gunakan environment variables
- **HTTPS Only**: Selalu gunakan HTTPS untuk komunikasi
- **Dependency Management**: Monitor dan update dependencies secara teratur

## Known Issues

Saat ini tidak ada known security issues.

## Security Headers

Kami merekomendasikan menggunakan security headers berikut:

```
X-Content-Type-Options: nosniff
X-Frame-Options: DENY
X-XSS-Protection: 1; mode=block
Strict-Transport-Security: max-age=31536000; includeSubDomains
Content-Security-Policy: default-src 'self'
```

## Dependencies

Kami secara aktif memonitor dependencies kami untuk vulnerability. Kami menggunakan:
- npm audit / composer audit
- GitHub security alerts
- Dependabot untuk automated updates

Terima kasih atas perhatian Anda terhadap keamanan proyek kami!
