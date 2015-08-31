FPM Project Specifications:
Front-End: jQuery (spinners, javascript library for spinner logic can be found in assets folder), AngularJS (populate views);
Back-End: mySQL (with queries done through Active Record and managed by phpMyAdmin), PHP on the serverside (through the codeIgniter framework), 

Workflow (from excel into phpMyAdmin)
1. Open the spreadsheet in excel, find and replace all "," with "@" (feel free to use any regex, choose one that does not appear in any of the data fields)
2. Copy the excel sheet without the title headers. Ensure that the first column of the dataset is a blank column (with this you can identify where random newline characters are appearing, thus enabling you to use the cleanData method below to remove them. Not the most elegant way but it works.
3. Paste it into a text editor, save as UTF-8 (to prevent weird EOF problems that can occur).
4. Feed this text file as your first command line argument and the output of the cleanData method as the second command line argument.

Excel spreadsheet -> raw text file (.txt) -> (into java) -> output of cleanData method of SQLinserter -> main method of SQLinserter -> .sql File -> phpMyAdmin import.

5. Make the necessary file path and value changes in the java program accordingly (places that are necessary to do so are noted)

6. Create a new database in phpMyAdmin that corresponds to the database name you used in the SQLinserter. Import the database in phpMyAdmin. You should have a complete database now. 

 Known bugs: 
 1. The spinner's hide method fade method fails to hide the back side of the wheel when the number of items in the wheel starts to get too large. A good place to start solving the problem is in the fade method in home.php (the z-index is the condition used to hide/show a spinner field, play around with that).
 2. Absolution positioning of HTML objects such as the glyphicon and the spinner columns are positioned absolute, i'm sure you'd want to make them relative. 