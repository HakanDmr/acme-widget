# Acme Widget Co | New Sales System PoC
This is new sales system PoC repository.

## Descriptions
There is two discount type:
1. Special Promotion Discount
2. Delivery Cost Discount

We can create Special Promotion camping by order count and discount rate.
Also, we should calculate total cost before the make delivery cost discount.
Since there is no database, there is a <b>DataLoaderHelper</b> class for demo data loading.
To keep the solution pure PHP, I didn't use composer for auto_loader.
I also mentioned some optimization, code refactoring requirements in the code command side.

### Architecture
I used MVC, Repository, Service patterns. 
According to PoC restrictions, I didn't use any database or framework.
I also added docker-compose file for easy deployment and test.
If you want to test the system over docker, you need to install docker and just type:
> docker run -itd -p 80:80 --name acme-poc-app hakand/acme-poc:v0.1

#### General Communication Flow
Controller => Service => Repository => Model

#### Helper Namespace
Helper/DataLoaderHelper.php => Load demo data for testing

Helper/SessionHelper.php => For keep user basket data also we can use central session handler for distributed solutions

Helper/VersionHelper.php => Checks PHP version for compatibility

#### Model Namespace
Model/IProductModel.php => is an interface for Products

Model/OrderModel.php => Data Structure for Orders

Model/ProductModel.php => Data Structure for Products

Model/SpecialOfferModel.php => Data Structure for Special Offers

#### Repository Namespace
Repository/ProductRepository.php => Repository class for Products

Repository/SpecialOfferRepository.php => Repository class for Special Offers

#### Service Namespace
Service/BasketService.php => Service for basket operations

Service/OrderService.php => Service for order operations

Service/ProductService.php => Service for product operations

### Tests
I developed one test class and 4 different test method to test the new sales system. I didn't write too much test because of PoC restrictions. In production version, we need to develop test with PHPUnit framework. All test successfully passed.
You can find out more details in <b>Test/OrderTest.php</b> file.
To run test again: you need send that query string = http://localhost/?test=order