#haphan/cloudfactory

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

