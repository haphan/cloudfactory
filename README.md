#haphan/cloudfactory

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/haphan/cloudfactory/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/haphan/cloudfactory/?branch=master) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/bd0dfc3a-42ce-44dd-9351-9689e018e3f9/mini.png)](https://insight.sensiolabs.com/projects/bd0dfc3a-42ce-44dd-9351-9689e018e3f9)

cloudfactory is a standard library for PHP that abstracts away differences among multiple cloud providers.
This library is inspired by [pkgcloud/pkgcloud](https://github.com/pkgcloud/pkgcloud/blob/master/README.md)  for nodejs

###Unified Vocabulary

Due to the differences between the vocabulary for each service provider, cloudfactory uses its own unified vocabulary.

Compute: Server, Image, Flavor
Storage: Container, File
DNS: Zone, Record


###Supported APIs

* **Compute**
  * OpenStack (RackSpace)
  * DigitalOcean
  * Azure
  * Amazon Web Services (AWS)
* **Storage**
  * OpenStack (RackSpace)
  * AWS

