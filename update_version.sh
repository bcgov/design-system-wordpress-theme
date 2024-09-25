# #!/bin/bash

# # Prompt for version input
# echo "Enter the new version number: "
# read VERSION

# # Validate version number format
# if ! [[ $VERSION =~ ^[0-9]+\.[0-9]+\.[0-9]+$ ]]; then
#   echo "Invalid version number format. Please use x.x.x."
#   exit 1
# fi

# # Update style.css
# perl -pi -e "s/Version: [0-9.]+/Version: ${VERSION}/" style.css

# # Update composer.json
# perl -pi -e "s/\"version\": \"[0-9.]+\"/\"version\": \"${VERSION}\"/" composer.json

# # Update package.json
# perl -pi -e "s/\"version\": \"[0-9.]+\"/\"version\": \"${VERSION}\"/" package.json

# echo "Version updated successfully!"

# Minor version Y (x.Y.z | x > 0) MUST be incremented if new, backward compatible functionality is introduced to the public API.
# It MUST be incremented if any public API functionality is marked as deprecated. 
# It MAY be incremented if substantial new functionality or improvements are introduced within the private code.
# It MAY include patch level changes. 
# Patch version MUST be reset to 0 when minor version is incremented.
# ref: https://semver.org/#spec-item-7

#!/bin/bash

# Prompt for version increment type
echo "Choose the version increment type:"
echo "1. Major"
echo "2. Minor"
echo "3. Patch"
read -p "Enter your choice (1/2/3): " CHOICE

# Get the current version number
CURRENT_VERSION=$(perl -ne 'print $1 if /Version: ([0-9.]+)/' style.css)

# Split the current version into major, minor, and patch numbers
MAJOR=$(echo $CURRENT_VERSION | cut -d '.' -f 1)
MINOR=$(echo $CURRENT_VERSION | cut -d '.' -f 2)
PATCH=$(echo $CURRENT_VERSION | cut -d '.' -f 3)

# Increment the version number based on the chosen type
case $CHOICE in
  1) MAJOR=$((MAJOR + 1)); MINOR=0; PATCH=0 ;;
  2) MINOR=$((MINOR + 1)); PATCH=0 ;;
  3) PATCH=$((PATCH + 1)) ;;
  *) echo "Invalid choice. Exiting."; exit 1 ;;
esac

# Create the new version number
NEW_VERSION="${MAJOR}.${MINOR}.${PATCH}"

# Update style.css
perl -pi -e "s/Version: [0-9.]+/Version: ${NEW_VERSION}/" style.css

# Update composer.json
perl -pi -e "s/\"version\": \"[0-9.]+\"/\"version\": \"${NEW_VERSION}\"/" composer.json

# Update package.json
perl -pi -e "s/\"version\": \"[0-9.]+\"/\"version\": \"${NEW_VERSION}\"/" package.json

echo "Version updated successfully to ${NEW_VERSION}!"