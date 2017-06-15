# Encryption, hashing, encoding and obfuscation

The following terms have different meaning and are often confused. Cryptography
is a very complex and large field, and it is good to know more about it, but
for professional reinventing of cryptographic algorithms, it's best left to
professionals only.

**Encryption** changes data in such a way that it can be converted back to its
original state when the correct encryption key is known.

**Hashing** changes data in a way that it can **NOT** be converted back to
ts original state. Hashing is commonly used for verifying passwords (in such
cases, an application doesn't need to know the actual password to operate
normally).

**Encoding** has nothing to do with cryptographic algorithms directly. Encoding
is transforming data so that it can be properly read by different systems and
applications.

**Obfuscation** is changing data so that it becomes more difficult to read or
to be reverse engineered.

## See also

* [Paragonie Blog](https://paragonie.com/blog)
* [How to Work With Users' Passwords and How to Securely Hash Passwords in PHP?](/security/passwords.md)
* [Obfuscation (software)](https://en.wikipedia.org/wiki/Obfuscation_(software))
