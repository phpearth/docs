---
title: "PDO vs. mysqli?"
author: "Peter Kokot"
read_time: "2 min"
updated: "september 17, 2014"
---

Since MySQL extension is deprecated and will be removed in the future versions of PHP the only good solution for connecting with your
database is to use PDO or mysqli extension. But what are the differences and which API would fit into your application?

Performance difference between mysqli and PDO are about the same but features are not. Let's compare mysqli and PDO in this short
feature comparison:

<table>
    <tr>
        <td></td>
        <td>PDO</td>
        <td>mysqli</td>
    </tr>
    <tr>
        <td>Database support</td>
        <td>12 drivers for different databases</td>
        <td>MySQL only</td>
    </tr>
</table>

