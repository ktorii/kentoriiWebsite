# kentorii.com 
**THIS REPO IS PUBLIC FOR EMPLOYERS TO SEE. DO NOT PUT SENSITIVE INFORMATION IN HERE**

## Updating production
1. If the user is not set to have permission into godaddy cpanel for kentorii.com, then set that up by importing the user's private key on godaddy.com
2. ssh into the production server on godaddy: `ssh -l <username-for-godaddy-account> kentorii.com -p <port-number>`
3. navigate to the main www directory
4. git fetch and merge the develop branch from github. make sure current branch is develop
5. make sure everything works on the live site. all developers need to go on the site and make sure the features are working. QA does not test this.
6. once everything is confirmed to be working on production, push the cards related to this period's release number into the corresponding release list on trello.
7. Make a branch like `release-1.13` on the git repo that branches off the working dev branch.
8. Merge the dev branch into the master branch too
