# DSWP Information Contact Socials

## Overview
This pattern creates a bordered container with a header and a grid of contact/social information cards. Each card features an icon, heading, description, and link. It's ideal for contact pages, footer sections, or any area requiring organized contact information.

::: warning Important Note
Each pattern consists of several blocks. Only adjust the content and color block settings. The structural settings (padding and margins) are pre-configured for responsiveness. Modifying structural settings may break the pattern.
:::

## Pattern Components
![Pattern Components](/images/patterns/dswp-information-contact-socials/components.png)

The pattern consists of:
1. **Header Section**
   - Light gray-blue background
   - H4 heading with 50px side padding
   - 30px vertical padding

2. **Cards Container**
   - 1px border (border-default color)
   - 60px vertical margins
   - 50px horizontal padding

3. **Information Cards (2x2 grid)**
   - Each card contains:
     - 28px width icon
     - H6 heading
     - Description paragraph
     - Link
   - 40px gap between icon and content
   - 80px gap between columns

## Spacing Details
![Spacing Details](/images/patterns/dswp-information-contact-socials/spacing.png)

Key measurements:
- Container spacing:
  - Top/Bottom margin: 60
  - Left/Right padding: 60
- Header padding:
  - Top/Bottom: 30
  - Left/Right: 50
- Card grid:
  - Column gap: 80
  - Row margin: 50 (top/bottom)
- Card content:
  - Icon width: 28px
  - Element gap: 40

## Common Tasks

### Adding the Pattern
1. Click the plus button to add a new block
2. Select "All" from the block menu
3. Choose "dswp-information-contact-socials" pattern

### Customizing Elements
#### Header Modification:
1. Click to edit the H4 heading
2. Maintains light gray-blue background
![Header editing](/images/patterns/dswp-information-contact-socials/header-edit.png)

#### Card Customization:
1. **Icons:**
   - Select image block
   - Click "Replace"
   - Upload 28px square icon
![Icon replacement](/images/patterns/dswp-information-contact-socials/icon-replace.png)

2. **Content:**
   - Edit H6 heading
   - Update description text
   - Modify link URL and text
![Card editing](/images/patterns/dswp-information-contact-socials/card-edit.png)

### Layout Considerations
- Desktop: 2x2 grid
- Tablet: 2x2 grid maintained
- Mobile: Stacks to single column
![Responsive behavior](/images/patterns/dswp-information-contact-socials/responsive.png)

## Style Classes
Important classes:
- `dswp-information-contact-socials-cards`: Main container
- `dswp-information-contact-socials-card`: Individual card
- `dswp-information-contact-socials-card-img-group`: Icon container
- `dswp-information-contact-socials-card-content`: Content wrapper

## Block Documentation
For detailed instructions on modifying specific blocks, refer to WordPress's official documentation:
- [Group Block](https://wordpress.com/support/wordpress-editor/blocks/group-block/)
- [Columns Block](https://wordpress.com/support/wordpress-editor/blocks/columns-block/)
- [Heading Block](https://wordpress.com/support/wordpress-editor/blocks/heading-block/)
- [Image Block](https://wordpress.com/support/wordpress-editor/blocks/image-block/)
- [Paragraph Block](https://wordpress.com/support/wordpress-editor/blocks/paragraph-block/)
