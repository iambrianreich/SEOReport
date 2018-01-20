""" <-- 3 

Violations:
1. Extraneous Whitespace https://www.python.org/dev/peps/pep-0008/#whitespace-in-expressions-and-statements
2. Spaces around operators https://www.python.org/dev/peps/pep-0008/#id28
3. Documentation strings https://www.python.org/dev/peps/pep-0008/#documentation-strings
4. letter variable declarations
5. Indentation level https://www.python.org/dev/peps/pep-0008/#indentation <-- All of this code has an incorrect indentation level.
6. Tabs vs spaces https://www.python.org/dev/peps/pep-0008/#tabs-or-spaces <-- All of the code in this program uses tabs instead of spaces.
"""

totalValue =0 #2
totalCredits =0 #2
semesterGPA =0 #2
cumulativeGPA =0.0 #2
semGPA =0.0 #2
cumGPA =0.0 #2
keep_going =' y ' #2 & 1
grades ={} #2
grades[' A '] =' 4.0 ' #2 & 1 
grades[' B '] =' 3.0 ' #2 & 1 
grades[' C '] =' 2.0 ' #2 & 1 
grades[' D '] =' 1.0 ' #2 & 1 
grades[' F '] =' 0.0 ' #2 & 1 

A =' A ' #1, 2, and 4 
B =' B ' #1, 2, and 4 
C =' C ' #1, 2, and 4  
D =' D ' #1, 2, and 4  
F =' F ' #1, 2, and 4  
y =' y ' #1, 2, and 4  
n =' n ' #1, 2, and 4 

while keep_going ==' y ': #2 & 1 

        grade =input(' Please enter your letter grade(s): ') #2 & 1 
			
	if grade == ' A ':
		totalValue +=float(grades[' A ']) * 3.0 #2 & 1 
		totalCredits += 3.0
	elif grade == ' B ':
		totalValue +=float(grades[' B ']) * 3.0  #2 & 1 
		totalCredits += 3.0
	elif grade == ' C ':
		totalValue +=float(grades[' C ']) * 3.0 #2 & 1 
		totalCredits += 3.0
	elif grade == ' D ':
		totalValue +=float(grades[' D ']) * 3.0 #2 & 1 
		totalCredits += 3.0
	else:
		totalValue +=float(grades[' F ']) * 3.0 #2 & 1 
		totalCredits += 3.0	
	keep_going =input("Enter 'y', if you want to enter more grades or 'n' if you don't want to enter any more grades: ") #2
		
cumulativeGPA =input("Enter your cumulative GPA to see how your GPA will improve with the entered grades: ") #2
print("The total grade value you've entered is: " +str(totalValue)) #2
print("The total credit(s) you've entered is/are: " +str(totalCredits)) #2
semGPA =totalValue / totalCredits #2
print("Your semester GPA is: " +str(semGPA)) #2
cumGPA =float((semGPA + cumulativeGPA) / 2) #2
#cumGPA = str( (totalValue / totalCredits) + cumulativeGPA) / 2) ) 
print("Your cumulative GPA is: " +str(cumGPA)) #2
