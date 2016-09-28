---
title: "What is Dead End antipattern?"
updated: "March 28, 2015"
permalink: "/articles/object-oriented-programming/anti-patterns/what-is-dead-end/"
redirect_from: "/faq/object-oriented-programming/anti-patterns/what-is-dead-end/"
---

# Dead End
**Also Known As**: Kevorkian Component


A Dead End is reached by modifying a reusable component, if the modified component is no longer maintained and supported by the supplier. When these modifications are made, the support burden transfers to the application system developers and maintainers. Improvements in the reusable component cannot be easily integrated, and support problems may be blamed on the modification.

The supplier may be a commercial vendor, in which case this AntiPattern is also known as Commercial off-the-shelf (COTS) Customization. When subsequent releases of the product become available, the special modifications will have to be made again, if possible. If fact, it may not be possible to upgrade the customized component, for various reasons such as cost and staff turnover.

The decision to modify a reusable component by a system's integrator is often seen as a workaround for the vendor's product inadequacies. As a short-term measure, this helps a product development progress, rather than slow it down.

The longer-term support burden becomes untenable when trying to deal with the future application versions and the "reusable component" vendor's releases. The only time we saw this work was when the system's integrator arranged with the reusable component vendor that the SI modifications would be included in the next release of the vendor product. It was pure luck that their objectives were the same.

# Refactored Solution

Avoid COTS Customization and modifications to reusable software. Minimize the risk of a Dead End by using mainstream platforms and COTS infrastructure, and upgrading according to the supplier's release schedule.

When customization is unavoidable, use an isolation layer (see Vendor Lock-In). Use isolation layers and other techniques to separate dependencies from the majority of the application software from customizations and proprietary interfaces.

A Dead End may be an acceptable solution in testbeds that support basic research such as throwaway code, and significant benefits are realized through the customization.