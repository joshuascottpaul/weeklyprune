weeklyprune
===========

keep oldest file per week in a folder and delete the others - specify folder and extension

weeklyprune.php runs from command line takes two arguments path and extension of files to process - if extension is * then take all extension 

example php weeklyprune.php "C:\logs" zip

a week starts on sunday and ends on saturday

there's a folder called backup2012 - php weeklyprune.php "C:\backup2012" zip

there are 500 files in the folder

there might be 3 files on jan 12th at 1pm, 3pm and 6pm

there might be 1 file on mar 3rd, 1 file on mar 5th and 1 file on mar 7th 

in 2012, assume week 1 is sun jan 1 to sat jan 7th to make it easy to explain

check if there are files on jan 7th if there are find the oldest then delete all other files in that week

if not then check if there are files on jan 6th if there are find the oldest then delete all other files in that week

etc

now go to week 2 - etc

of course in some weeks there will be no files
