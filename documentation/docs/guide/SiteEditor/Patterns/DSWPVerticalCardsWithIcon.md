# DSWP Vertical Cards With Icon

## Overview
This pattern creates a grid of vertical cards, each featuring an icon, heading, and a list of links. The cards have a distinctive gold top border and light gray background, with a consistent layout and spacing.

::: warning Important Note
The structural settings (padding, margins, borders) are pre-configured for responsiveness. Only modify content and colors to maintain design consistency.
:::

## Pattern Components
![Pattern Components](/images/patterns/dswp-vertical-cards-with-icon/components.png)

Each card contains:
1. **Container**
   - 1px border (dswp-surface-color-border-default)
   - 7px border radius
   - Light gray background
   - 9px gold top border

2. **Icon Section**
   - Square image (256px)
   - Full width
   - Zero margins
   - Light gray background

3. **Content Section**
   - H5 heading (xx-large font size)
   - Three linked items
   - 60px side padding
   - Vertical flex layout

## Spacing Details
![Spacing Details](/images/patterns/dswp-vertical-cards-with-icon/spacing.png)

Key measurements:
- Card Container:
  - Border radius: 7px
  - Top border: 9px
  - Padding: 60px (top/bottom), 80px (sides)
  
- Content Area:
  - Heading margin-top: 50
  - Link group margins: 40 (top/bottom)
  - Link padding: 20 (top/bottom)
  - Line height: 1.2

- Grid Gap:
  - Horizontal: 40
  - Vertical: 40

## Common Tasks

### Adding the Pattern
1. Click the plus button to add a new block
2. Select "All" from the block menu
3. Choose "dswp-vertical-card-with-icon" pattern

### Customizing Elements
#### Icon Replacement:
1. Select the image block
2. Click "Replace"
3. Upload square image
4. Maintains full width alignment
![Icon replacement](/images/patterns/dswp-vertical-cards-with-icon/icon-replace.png)

#### Content Modification:
1. **Heading:**
   - Edit H5 text
   - Maintains dark font color
   - XX-large font size
![Heading editing](/images/patterns/dswp-vertical-cards-with-icon/heading-edit.png)

2. **Links:**
   - Edit link text
   - Update href attributes
   - Maintains 1.2 line height
![Link editing](/images/patterns/dswp-vertical-cards-with-icon/link-edit.png)

### Layout Considerations
- Desktop: 2x2 grid
- Tablet: 2x2 maintained
- Mobile: Single column
![Responsive behavior](/images/patterns/dswp-vertical-cards-with-icon/responsive.png)

## Style Classes
Important classes:
- `dswp-vertical-card-with-icon`: Main container
- `dswp-vertical-card`: Card wrapper
- `dswp-flex-box`: Content container
- `is-style-default`: Image style

## Theme Integration
- Uses `dswp-theme-primary-gold` for top border
- Uses `background-light-gray` for card background
- Uses `font dark` for text color
- Uses `dswp-surface-color-border-default` for card border

## Block Documentation
For detailed instructions on modifying specific blocks, refer to WordPress's official documentation:
- [Group Block](https://wordpress.com/support/wordpress-editor/blocks/group-block/)
- [Columns Block](https://wordpress.com/support/wordpress-editor/blocks/columns-block/)
- [Image Block](https://wordpress.com/support/wordpress-editor/blocks/image-block/)
- [Heading Block](https://wordpress.com/support/wordpress-editor/blocks/heading-block/)
- [Paragraph Block](https://wordpress.com/support/wordpress-editor/blocks/paragraph-block/)
