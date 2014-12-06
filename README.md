[![Build Status](https://travis-ci.org/fastwebmedia/Profanity-Filter.svg?branch=master)](https://travis-ci.org/fastwebmedia/Profanity-Filter)

## PHP Profinity Filter

##How to Intsall
###Laravel
Add ```'Fastwebmedia\ProfanityFilter\ProfanityServiceProvider'``` to your providers array.

If you wish to use the Facade then add 
```'Profanity'         => 'Fastwebmedia\ProfanityFilter\Profanity'```

The package will automatically use the config file containing the list of banned words. 