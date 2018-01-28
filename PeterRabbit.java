import java.io.File;
import java.util.Date; //Fixed, method broke it, constructor isn't deprecated 	Break 1
import java.io.FileNotFoundException;
import java.lang.*;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;
import java.util.*;
//Chaz Zawislak 
//Peter Rabbit. 
//Reads through all of peter rabbit and stores all the unique words.
/**I used this Program due to the fact i only had to alter and add a few things to break five of the CERT coding standards.
 *If you want to actually run the program i also pushed the "peter rabbit.txt" you need to put that in your JRE system library if you are running Eclipse.
 *
 *Break 1: MET02-J. Do not use deprecated or obsolete classes or methods (https://wiki.sei.cmu.edu/confluence/display/java/MET02-J.+Do+not+use+deprecated+or+obsolete+classes+or+methods)
 *Break 2: ERR06-J. Do not throw undeclared checked exceptions (https://wiki.sei.cmu.edu/confluence/display/java/ERR06-J.+Do+not+throw+undeclared+checked+exceptions)
 *Break 3: DCL01-J. Do not reuse public identifiers from the Java Standard Library (https://wiki.sei.cmu.edu/confluence/display/java/DCL01-J.+Do+not+reuse+public+identifiers+from+the+Java+Standard+Library)
 *Break 4: NUM09-J. Do not use floating-point variables as loop counters (https://wiki.sei.cmu.edu/confluence/display/java/NUM09-J.+Do+not+use+floating-point+variables+as+loop+counters)
 *Break 5: STR01-J. Do not assume that a Java char fully represents a Unicode code point (https://wiki.sei.cmu.edu/confluence/display/java/STR01-J.+Do+not+assume+that+a+Java+char+fully+represents+a+Unicode+code+point)
 */


public class PeterRabbit 
{

		      
	public static void main(String[] args) throws ArrayIndexOutOfBoundsException, StringIndexOutOfBounds, FileNotFoundException //Fixed	Break 2
	{
		
			//reads the file 
			Scanner sc = new Scanner(new File("peter rabbit.txt")); //Fixed		Break 3
			ArrayList<String> uniqueWords = new ArrayList<String>();
			
			Date date = new Date(); //Fixed 	Violates 1
			Date differ = Date.getTime();
			
			//reads through each line
			while (Scanner.hasNextLine()) 				
			{
				
			//reads the words on each line removing special characters
			String str1 = Scanner.nextLine();						
			String[] words;
			str1 = str1.replaceAll("\\W", " ");
			
			
	        	//removes spaces
			words = str1.split(" ");
			
			
			//banks the unique words that are 3 letters or longer 
			for (int i = 0; i < words.length(); i++) //Fixed	break 4 and 5
			{
			    if (!(uniqueWords.contains (words[(int) i])) && 3 <= words[(int) i].length())
			    {
			        uniqueWords.add(words[(int) i]);
			    }
			}
			

			}
			//sorts them and prints them out
			Collections.sort(uniqueWords);
			System.out.println(differ);
			System.out.println(uniqueWords.toString());
	}
}
