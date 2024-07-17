# Patterns

## Template Parts
### How to Add a Template Part by Category

To add a template part, create an `.html` file in the `parts` folder that represents your template part. For example, let's create a header template part called `header-site-title.html`.

#### Getting Started with a Template Part

##### Step 1: Create the Look and Layout
Create the look and layout you want inside a group block.

##### Step 2: Copy the Code
Switch to code view and copy the code to your clipboard.

##### Step 3: Paste the Code
Paste the code into your `.html` file.

#### Alternative Source of Starter Template Parts

You can also use the WordPress pattern directory as a source of starter template parts: https://wordpress.org/patterns/

#### Registering the Template Part

Once the code is added to your template part `.html` file, edit the `theme.json` file to register the template part.

### Example: Adding a Header Template Part

Here's an example of how to add multiple headers to the header category of the template parts for the site editor:

```json
"templateParts": [
  {
    "name": "header-no-site-title",
    "title": "Header No Site Title",
    "area": "header"
  },
  {
    "name": "header-site-title",
    "title": "Header Site Title",
    "area": "header"
  },
]