---
title: "How to show errors in PHP?"
read_time: "1 min"
updated: "august 29, 2015"
group: "general"
permalink: "/faq/how-to-show-errors/"
---

When you develop you must turn error reporting in PHP on. You can do this in php.ini by setting the flag `display_errors`:

```ini
display_errors = On
```

Be carefull when you deploy your code online you must disable error reporting for security purposes. You definitely don't
want to expose error messages which can contain delicate information about your application to the ouside world:

```ini
display_errors = Off
```

