# Contributing to Random Joke Generator

Terima kasih telah tertarik untuk berkontribusi pada Random Joke Generator! Panduan ini akan membantu Anda memulai.

## Code of Conduct

Proyek ini dan semua peserta mematuhi [Code of Conduct](CODE_OF_CONDUCT.md) kami. Dengan berpartisipasi, Anda diharapkan untuk mematuhi kode ini.

## Bagaimana Cara Berkontribusi?

### Melaporkan Bug

Sebelum membuat laporan bug, periksa issue list karena Anda mungkin menemukan bahwa bug sudah dilaporkan. Ketika Anda membuat laporan bug, sertakan sebanyak detail yang mungkin:

- **Gunakan judul yang deskriptif** untuk issue
- **Deskripsikan langkah-langkah yang tepat** untuk mereproduksi masalah
- **Berikan contoh spesifik** untuk mendemonstrasikan langkah-langkah
- **Deskripsikan perilaku yang diamati** dan **apa yang seharusnya terjadi**
- **Sertakan screenshot/video** jika memungkinkan
- **Berikan versi PHP, browser, dan OS** Anda

### Menyarankan Peningkatan

Saran peningkatan dilacak sebagai GitHub issues. Ketika membuat saran peningkatan, sertakan:

- **Gunakan judul yang deskriptif**
- **Berikan deskripsi detail** tentang peningkatan yang disarankan
- **Berikan contoh spesifik** untuk mendemonstrasikan langkah-langkah
- **Jelaskan mengapa** peningkatan ini akan berguna

### Pull Request

- Ikuti panduan gaya PHP dan JavaScript kami
- Sertakan pernyataan PR yang tepat mendeskripsikan perubahan
- Berakhiri semua file dengan newline
- Hindari platform-dependent code

## Panduan Gaya

### PHP

- Gunakan PSR-12 coding standard
- Gunakan 4 spaces untuk indentasi
- Gunakan meaningful variable names
- Tambahkan docblocks untuk semua fungsi dan kelas
- Maksimal 120 karakter per baris

```php
/**
 * Menjelaskan fungsi
 *
 * @param string $param1 Deskripsi parameter
 * @return string Deskripsi return value
 */
public function functionName($param1)
{
    // Implementation
}
```

### JavaScript

- Gunakan ES6+
- Gunakan const/let, hindari var
- Gunakan meaningful variable names
- Tambahkan JSDoc comments
- Maksimal 100 karakter per baris

```javascript
/**
 * Menjelaskan fungsi
 * @param {string} param1 - Deskripsi parameter
 * @returns {string} Deskripsi return value
 */
function functionName(param1) {
    // Implementation
}
```

## Proses Pengembangan

1. Fork repository
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buka Pull Request

## Testing

Sebelum submit PR:

- Test kode Anda secara menyeluruh
- Pastikan tidak ada error atau warning
- Update tests jika perlu
- Pastikan tests pass: `composer test`

## Dokumentasi

- Update README.md jika perlu
- Tambahkan comments untuk complex logic
- Update CHANGELOG.md untuk perubahan signifikan

## Lisensi

Dengan berkontribusi pada proyek ini, Anda setuju bahwa kontribusi Anda akan dilisensikan di bawah MIT License.

---

Pertanyaan? Hubungi maintainers atau buka issue untuk diskusi!
