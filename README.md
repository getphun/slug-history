# slug-history

Adalah module yang menyediakan log history. Module ini memastikan perubahan slug
pada suatu object tidak akan menghasilkan 404. Module ini menyediakan satu service
dengan nama `slug` yang bisa dipanggil dari controller dengan perintah `$this->slug`.

```php
// menambahkan satu slug history
$this->slug->create('post', 15, 'pidato-presiden-jokowi', 'pidato-presiden-di-istana');

// mengambil slug terbaru dari slug lama post
$next = $this->slug->get('post, 'pidato-presiden-jokowi');

// mengambil semua slug history suatu object
$slugs = $this->slug->index('post', 15);

// menghapus semua history slug suatu post
$this->slug->remove('post', 15);
```

## create($group, $id, $old, $new)

```php
/**
 * Method untuk membuat history slug baru.
 * @param string $group Nama group slug history
 * @param integer $id Id object
 * @param string $old Slug object lama
 * @param string $new Slug object baru
 */
```

## get($group, $slug)

```php
/**
 * Method untuk mengambil slug terbaru dari slug yang lama.
 * @param string $group Nama group slug history
 * @param string $slug Slug lama yang diketahui
 * @return object slug
 */
```

## goto($group, $slug, $router, $router_param='slug', $router_params=[])

```php
/**
 * Redirect request ke halaman baru dari suatu slug
 * @param string $group Nama group slug history
 * @param string $slug Slug lama yang diketahui
 * @param string $router Nama router kemana user akan diredirect
 * @param string $router_param Nama paramater slug di router.
 * @param array $router_params Additional parameters to send to url generator.
 * @return boolean false jika tidak menemukan data
 */
```

## index($group, $id)

```php
/**
 * Mengambil semua slug history suatu object
 * @param string $group Nama group slug history
 * @param integer $id Id object
 * @return array object slug history
 */
```

## remove($group, $id)

```php
/**
 * Menghapus semua history slug suatu object
 * @param string $group Nama group slug history
 * @param integer $id Id object
 * @return boolean true
 */
```