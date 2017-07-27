#!/bin/bash

# pre-steps: go into REPO folder and git clone kentoriiWebsite
# update repo files with git fetch+merge

# the location of godaddy's website root
GODADDY_SITE_ROOT="/home/ktorii7/public_html"

# name of repo must be kentoriiWebsite
REPO_NAME="kentoriiWebsite"
REPO_DIRECTORY="/home/ktorii7/REPO/$REPO_NAME"

# check if repo name is exactly what's it's supposed to be.
# if the repo does not exist, quit the script
if [ ! -d "$REPO_DIRECTORY" ]; then
    echo "The Github repo does not exist locally"
    exit 1
fi

# remove old version of live website
rm -rf $GODADDY_SITE_ROOT/*

# copy contents of website repo into the proper directory where godaddy assumes where the root is
cp -rf $REPO_DIRECTORY/www/html/* $GODADDY_SITE_ROOT/
