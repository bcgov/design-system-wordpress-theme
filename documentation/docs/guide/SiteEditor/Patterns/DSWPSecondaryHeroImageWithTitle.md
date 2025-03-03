# DSWP Secondary Hero Image With Title

## Overview
This pattern creates a secondary hero section with a bold title on the left and a fixed-height image on the right. It features a primary color background and is designed for secondary page headers or section breaks.

::: warning Important Note
Each pattern consists of several blocks. Only adjust the content and color block settings. The structural settings (padding and margins) are pre-configured for responsiveness. Modifying structural settings may break the pattern.
:::

## Pattern Components
![Pattern Components](/images/patterns/dswp-secondary-hero-image-with-title/components.png)

The pattern consists of:
1. **Title Column (30%)**
   - Large, bold heading
   - White text color
   - Vertically centered
   - Left-aligned

2. **Image Column (70%)**
   - Fixed 216px height
   - Auto width
   - Right-aligned
   - Zero margins

3. **Container**
   - Primary color background
   - 60px top/bottom margin
   - Zero padding
   - Full width

## Spacing Details
![Spacing Details](/images/patterns/dswp-secondary-hero-image-with-title/spacing.png)

Key measurements:
- Container margins: 60 (top/bottom)
- Image height: 216px
- Column distribution:
  - Title: 30%
  - Image: 70%
- Zero internal padding

## Common Tasks

### Adding the Pattern
1. Click the plus button to add a new block
2. Select "All" from the block menu
3. Choose "dswp-secondary-hero-image-with-title" pattern

### Customizing Elements
#### Title Modification:
1. Click to edit the heading text
2. Maintains white color
3. Keep bold formatting
![Title editing](/images/patterns/dswp-secondary-hero-image-with-title/title-edit.png)

#### Image Replacement:
1. Select the image block
2. Click "Replace"
3. Upload or choose new image
4. Image automatically resizes to 216px height
![Image replacement](/images/patterns/dswp-secondary-hero-image-with-title/image-replace.png)

### Layout Considerations
- Desktop: Side-by-side layout
- Tablet: Maintains side-by-side
- Mobile: Stacks with title above image
![Responsive behavior](/images/patterns/dswp-secondary-hero-image-with-title/responsive.png)

## Style Classes
Important classes:
- `dswp-secondary-hero-image-with-title`: Main container
- `dswp-image-container`: Image column wrapper

## Theme Integration
- Uses `typography-primary-color` for background
- Uses `background-white` for text color
- Maintains consistent spacing with theme variables

## Block Documentation
For detailed instructions on modifying specific blocks, refer to WordPress's official documentation:
- [Group Block](https://wordpress.com/support/wordpress-editor/blocks/group-block/)
- [Columns Block](https://wordpress.com/support/wordpress-editor/blocks/columns-block/)
- [Heading Block](https://wordpress.com/support/wordpress-editor/blocks/heading-block/)
- [Image Block](https://wordpress.com/support/wordpress-editor/blocks/image-block/)
