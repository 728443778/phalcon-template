#程序使用说明以及一些注意事项

## 本程序使用Phalcon框架开发，其中该使用的缓存已全部使用，对于部分使用ORM的代码，如果程序的数据发生了变动，则需要删除对应的metaData文件，cache/metaData 

## 因为以后可能不会使用php-fpm  所以在开发程序时，不要在程序内部使用echo flush 等函数

## 本程序是virtual的用户中心