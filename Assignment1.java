
/* Name: Frank Polumbo
	 * Date: April 21st 2017
	   When the user enters their zipcode, their city and state will appear along with their name.
	   * It has been broken with 5 violations. Those violations are listed below. 
	   *

       * Break 1. MET02-J. Do not use deprecated or obsolete classes or methods (https://wiki.sei.cmu.edu/confluence/display/java/MET02-J.+Do+not+use+deprecated+or+obsolete+classes+or+methods)
	   * Break 2. ENV02-J. Do not trust the values of environment variables. (https://wiki.sei.cmu.edu/confluence/display/java/ENV02-J.+Do+not+trust+the+values+of+environment+variables)
	   * Break 3. FIO01-J. Create files with appropriate access permissions. (https://wiki.sei.cmu.edu/confluence/display/java/FIO01-J.+Create+files+with+appropriate+access+permissions)
	   * Break 4. FIO04-J. Release resources when they are no longer needed. (https://wiki.sei.cmu.edu/confluence/display/java/FIO04-J.+Release+resources+when+they+are+no+longer+needed)
	   * Break 5. FIO14-J. Perform proper cleanup at program termination. (https://wiki.sei.cmu.edu/confluence/display/java/FIO14-J.+Perform+proper+cleanup+at+program+termination)
*/

	import javax.swing.JOptionPane;

	import java.util.Date;// Break 1.
	import java.util.Scanner;
	import java.io.*;

	

	public class Assignment1{
	
		public static void main(String[] args) throws IOException
		{
			//Variable Declaration
			String name, street;
			String zip;
			
					
			//Get info from user
			name = (JOptionPane.showInputDialog("Enter Name: "));
			
			street = (JOptionPane.showInputDialog("Enter Street: "));
			
			zip = (JOptionPane.showInputDialog("Enter Zip: "));
			
			//get username from user. Break 2.		
			String username = System.getenv("USER");
			
			
			//Open file
			//Break 3. 
			Scanner inputFile = new Scanner(new File("zips.csv"));
			
			//Creates Array name zipline, also initalizes the string outputLine
			String[] zipLine;
			String outputLine = "";
			
			//Searches through file for zip, city, and state.
			while (inputFile.hasNextLine())
			{
				//Splits the columns by commas
				zipLine = inputFile.nextLine().split(",");
				
				//if the zip code exists, prints matching information from spread sheet 
				if (zip.equals(zipLine[0]))
				{
					//converts to lowercase while keeping first letter uppercase
					String city = zipLine[2].charAt(0) + zipLine[2].substring(1).toLowerCase();
					
					//prints out to screen
					System.out.println(name + ", " + street + ", " + city + ", " + zipLine[1] + " " +
				zip);
					//makes a variable to use outside of loop
					outputLine = name + ", " + street + ", " + city + ", " + zipLine[1] + " " +
							zip;			
				}
			
			}
			
							
			//Create new file
			File output = new File("Output.txt");
			output.createNewFile();
			
			//Exits file Break 5.			
			Runtime.getRuntime().exit(1);
			
			//Writes to file
			PrintWriter zipOutput = new PrintWriter(output);
			zipOutput.println(outputLine);
			
			//Break 4. (Files aren't closed)
		}
			
			
			
			
	}


