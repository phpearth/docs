---
stage: prewriting
---

# Sessions

Sessions in web applications provide a way to persist data between requests.

When you start a new PHP session with `session_start()`, by default, there is a
file created on the server somewhere in system temporary folder (/tmp on Linux,
for example or the location set in the php.ini file under the `session.save_path`
INI directive). File name can be of format `sess_ag525kn0fk6ik9r84kap9lkbfl` and
its contents contain your `$_SESSION` data.

And there is also a special single cookie created in user browser with name
`PHPSESSID` and value of something like `ag525kn0fk6ik9r84kap9lkbfl`

That cookie *connects* the user *browser* with that file where `$_SESSION` info
is stored. Quite a simple storing mechanism.

Now, these traditional sessions are slow and performance bottlenecks soon so other
ways of storage are used, or also if you want to make them more secure, they can
be encrypted (that file contents) and so on.

Whatever you do, try not to store anything sensitive in cookies. You actually
won't need to create and use custom created cookies at all in most cases. Only
for example, when you want to display that EU cookie warnings and to remember is
user clicked "ok, don't display this next time". And similar cases.

For login, sessions are the way to go.

Yes, `session_destroy()` removes that file on the server but the PHPSESSID cookie
remains on the user browser. Which is not problematic because the new tmp file on
the server will be created next time you call `session_start()` with new content
of your defined $_SESSION array contents...
