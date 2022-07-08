<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Brian Gomez(bg339)</td></tr>
<tr><td> <em>Generated: </em> 7/7/2022 10:39:29 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone1-deliverable/grade/bg339" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone1 branch</li><li>Create a milestone1.md file in your Project folder</li><li>Git add/commit/push this empty file to Milestone1 (you'll need the link later)</li><li>Fill in the deliverable items<ol><li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e,&nbsp;<a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li></ol></li><li>Ensure your images display correctly in the sample markdown at the bottom</li><li>Save the submission items</li><li>Copy/paste the markdown from the "Copy markdown to clipboard link" or via the download button</li><li>Paste the code into the milestone1.md file or overwrite the file</li><li>Git add/commit/push the md file to Milestone1</li><li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li><li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku dev</li></ol></li><li>Make a pull request from dev to prod (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku prod</li></ol></li><li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li></ol></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177892894-cfcdb82b-fae2-418c-8161-6ad427831260.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid email<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177893134-b23cfdfa-d56f-4f76-9852-4b1de75eaf19.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid pw length and invalid pw<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177893182-9652d64a-9cd5-4415-b9a0-9576c1c29261.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Duplicate email<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177893553-0daae7bd-41a2-4e42-bb26-260d41cb8e97.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful registration<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177893733-489826d1-9e39-4286-aba0-b3b5979886a2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User DB with most recent account including timestamp. new user &quot;<a href="mailto:&#116;&#x65;&#x73;&#x74;&#117;&#x73;&#101;&#114;&#64;&#x67;&#x6d;&#97;&#x69;&#108;&#x2e;&#99;&#111;&#109;">&#116;&#x65;&#x73;&#x74;&#117;&#x73;&#101;&#114;&#64;&#x67;&#x6d;&#97;&#x69;&#108;&#x2e;&#99;&#111;&#109;</a>&quot; was registered.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/14">https://github.com/bg339/IT202Summer/pull/14</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Register page has email, password, username, and confirm fields. These fields must hold<br>valid information before submitting to be fully populated into the database. Invalid information<br>will prompt a flash message with the respective error. Inputting correct information will<br>prompt a successful registration and you can then proceed to log in.&nbsp;<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177898166-5c6bc698-ad3e-48a2-b25a-e0d81e91ffd9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid Login pw<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177898616-7382eb97-3a2d-43d9-afad-07b345bc6a5e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>No email/username found<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177898211-54647779-4e65-47c2-9b58-56c183779792.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful Login<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/19/commits/">https://github.com/bg339/IT202Summer/pull/19/commits/</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>User logs in through login.php<div>They need to enter the username/email and then the<br>correct password. Both of these fields are validated on the client side and<br>server side to ensure successful and authorized login. A wrong input such as<br>incorrect letter or mistakingly capitalizing will result in a invalid password and mistyping<br>a username or email will result in an unsuccessful login.</div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177899848-17f3cff8-7afb-4b28-9bf8-cbfe9023479c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful logout<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177899913-ef889210-29f0-4da7-9c55-917c1e6d43c0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>log in protected<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/31/commits/">https://github.com/bg339/IT202Summer/pull/31/commits/</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Clicking the logout button will successfully log out the user. When attempting to<br>access a login protected page such as profile, they will be prompted with<br>a flash message that says they must be logged in.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177899913-ef889210-29f0-4da7-9c55-917c1e6d43c0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>log in protected<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177900388-d80b26a5-ffe9-4c1b-8e8e-f35cdbee5110.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>role protected<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177900605-fdb82035-0894-4171-80c0-49116340ea5e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Roles<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177900636-89e88fb0-eb72-48fd-8732-25b67ef0778e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>UserRoles<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pulls?q=is%3Apr+is%3Aclosed">https://github.com/bg339/IT202Summer/pulls?q=is%3Apr+is%3Aclosed</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/30">https://github.com/bg339/IT202Summer/pull/30</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>If the user is not logged in and tries to access a page<br>that requires you to be logged in, they will not be given access<br>and a message will be flashed prompting them to log in. is_logged_in() must<br>be true for the user to be able to access login-protected pages.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>Whether the user is logged in or out, if they do not have<br>the proper role, e.g &quot;Admin&quot;, to access the page, they will not be<br>given access. has_role() is used to confirm whether the user has the right<br>level of access. It essentially performs access control.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177902974-abd6aa2c-1513-43ac-adc6-6b8be211611f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Style sheet updated<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/36">https://github.com/bg339/IT202Summer/pull/36</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>I honestly just changed the color in regards to my style sheet. As<br>more things get implemented, I plan on continually changing the style sheet once<br>we throw in bootstrap. I did not want to go insanely crazy since<br>bootstrap will end up changing everything anyway.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177903495-f17e360d-28f6-4169-b829-0dfeb009c10a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid password error<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/17">https://github.com/bg339/IT202Summer/pull/17</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>When attempting to log in, message flashes at the top saying invalid password.<br>Whenever the user inputs incorrect info, the message will pop up showing them<br>their error.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177903930-8f5c2002-09db-4398-b95e-d7f7dab3b3f2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Profile Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/19">https://github.com/bg339/IT202Summer/pull/19</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>User will be able to see the profile page. They can edit username<br>email password. They can also see their current username and email in case<br>they forgot either or.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177893182-9652d64a-9cd5-4415-b9a0-9576c1c29261.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Duplicate email/Email in use<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177904563-30cbfdbf-7bef-45a6-bc71-bf42a61f7127.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Password reset successful<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177904706-ffeba777-3507-4959-9f50-aaf7f9374ee6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username update success<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177904767-1a8fbcf4-d35e-4f0c-be1e-5d3819be4394.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Password does not match<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177905013-0a6746df-8e53-42ac-a974-5b677d8f93e9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>before<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177905050-5954c4f9-f437-4de7-b415-f024ae2907ea.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>after<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/pull/19">https://github.com/bg339/IT202Summer/pull/19</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>User edits profile through profile page. It then gets updated in the database<br>whether they update the password or username. If they update password, then it<br>gets rehashed and put in the db. If they change the username, it<br>gets updated in the db. They have to input the correct info throughout<br>the whole form for it to work or else they will be prompted<br>with the respective error message.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Issues and Project Board </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98499966/177905927-03c57bb2-9707-4881-97f8-124cda342f16.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project board<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Include a direct link to your Project Board</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/bg339/IT202Summer/projects/1">https://github.com/bg339/IT202Summer/projects/1</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Prod Application Link to Login Page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://bg339-prod.herokuapp.com/Project/login.php">https://bg339-prod.herokuapp.com/Project/login.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone1-deliverable/grade/bg339" target="_blank">Grading</a></td></tr></table>