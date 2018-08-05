
Tajawal Hiring Process Task
----------

## Intro

I use Lumen Micro framework to Build Hotels Search API, I used Lumen to focus more on task,
 but I did not use all framework features to show of myself.
 
## Installation

I use `docker` & `Makefile` to automate installation process.
#### build & install
run the following commands
- `git clone https://github.com/MohamedHuzien/TajawalHiringTask.git` 
- `cd TajawalHiringTask` 
- `sudo make init`

#### you can run also:
- `make stop` to stop docker
- `make test` to run tests 

## RESTApi usege & Test
##### Test Api
you can run UnitTests by `sudo make test`
and 
you can access Api from [http://localhost:8081/api/v1/hotels/search?](http://localhost:8081/api/v1/hotels/search?)

#### Query Parameters
```
name                searches hotels by name
            e.g.:   http://localhost:8081/api/v1/hotels/search?name=media One Hotel
        
city         searches hotels by their city
            e.g.:   http://localhost:8081/api/v1/hotels/search?city=cairo
            
price_range               searches hotels by price range
            e.g.:   http://localhost:8081/api/v1/hotels/search?price_range=1:200
            
date_range                searches hotels by availabilty in a given date range
            e.g.:   http://localhost:8081/api/v1/hotels/search?date-range=1-1-2018:1-1-2019
sort_by             sorts the results by either name or price
            e.g.:   http://localhost:8081/api/v1/hotels/search?sort_by=name
            e.g.:   http://localhost:8081/api/v1/hotels/search?sort_by=price
            e.g.:   http://localhost:8081/api/v1/hotels/search?sort_by=name&ascending=1
      
```

## Code Desgin and Architect
I try to use S.O.L.D principles & desgin pattern and Hydrate everything into object as possible
#### Entities
Entities located in `app/Entities` folder .
`Hotel` & `Availability` to represent Hotels Data.
Entities in `app/Entities/Filters` to represent filters query every filter implements  `Filter` interface. `DateFilter` & `PriceFilter` implemant `RangeFilter` interface and some filters entity implements `SortFilter` eg `NameFilter`
## Design Pattern
- Filter Desgin Pattern: To make Hotels Filters criterias (name, price,Date,City ) criterias to make the checks if Hotel Entity meet criteria eg. `PriceCriteria`
- Factory Desgin Pattern : To build criteria Object from corresponding Filter Object
- Service and Repository Layers : Hotels Service and Repository to hide and encapsulate Hotels search Logic 

## Future enhancement
@todo
- Add Caching layer In Hotels Repository for large dataset
- Make Load & stress Test for API Endpoint to check how Endpoint act in load time and know API boundaries
- Write more test cases to increase code coverage


