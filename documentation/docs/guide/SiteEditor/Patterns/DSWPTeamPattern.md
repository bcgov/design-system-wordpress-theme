# DSWP Team Pattern

## Overview
This pattern creates a series of team member profiles, alternating between white and light gray backgrounds. Each profile features a circular image, name, subtitle, and detailed biography in a two-column layout.

::: warning Important Note
Each pattern consists of several blocks. Only adjust the content and color block settings. The structural settings (padding and margins) are pre-configured for responsiveness. Modifying structural settings may break the pattern.
:::

## Pattern Components
![Pattern Components](/images/patterns/dswp-team-pattern/components.png)

Each team member section contains:
1. **Image Column (18%)**
   - 180px width circular image
   - Aspect ratio 1:1
   - Object-fit: cover
   - Left-aligned

2. **Content Column (82%)**
   - H5 heading (2.0 line height)
   - Italicized subtitle (H6 size)
   - Three paragraphs of biography
   - Dark font color
   - Vertically centered

3. **Section Container**
   - Alternating backgrounds:
     - White
     - Light gray
   - 60px padding all sides
   - 40px vertical padding for columns

## Spacing Details
![Spacing Details](/images/patterns/dswp-team-pattern/spacing.png)

Key measurements:
- Container:
  - Top/Bottom margin: 50
  - Padding: 60 (all sides)
- Columns:
  - Top/Bottom padding: 40
  - Distribution: 18% / 82%
- Content spacing:
  - Subtitle bottom padding: 40
  - Paragraph line height: 1.7
  - Paragraph spacing: 20 (top/bottom)
  - Block gap: 30

## Common Tasks

### Adding the Pattern
1. Click the plus button to add a new block
2. Select "All" from the block menu
3. Choose "dswp-team-pattern" pattern

### Customizing Elements
#### Profile Image:
1. Select the image block
2. Click "Replace"
3. Upload square image (automatically crops to circle)
4. Maintains 180px width and 1:1 ratio
![Image replacement](/images/patterns/dswp-team-pattern/image-replace.png)

#### Text Content:
1. **Name:**
   - Edit H5 heading
   - Maintains 2.0 line height
![Name editing](/images/patterns/dswp-team-pattern/name-edit.png)

2. **Subtitle:**
   - Edit italic text
   - Maintains H6 font size
![Subtitle editing](/images/patterns/dswp-team-pattern/subtitle-edit.png)

3. **Biography:**
   - Edit three paragraphs
   - Maintains 1.7 line height
   - Dark font color
![Biography editing](/images/patterns/dswp-team-pattern/biography-edit.png)

### Layout Considerations
- Desktop: Side-by-side layout
- Tablet: Maintains side-by-side
- Mobile: Stacks with image above content
![Responsive behavior](/images/patterns/dswp-team-pattern/responsive.png)

## Style Classes
Important classes:
- `dswp-team-pattern`: Main container
- `is-style-rounded`: Circular image style
- `has-bcds-body-font-size`: Biography text size
- `has-bcds-h6-font-size`: Subtitle text size

## Block Documentation
For detailed instructions on modifying specific blocks, refer to WordPress's official documentation:
- [Group Block](https://wordpress.com/support/wordpress-editor/blocks/group-block/)
- [Columns Block](https://wordpress.com/support/wordpress-editor/blocks/columns-block/)
- [Image Block](https://wordpress.com/support/wordpress-editor/blocks/image-block/)
- [Heading Block](https://wordpress.com/support/wordpress-editor/blocks/heading-block/)
- [Paragraph Block](https://wordpress.com/support/wordpress-editor/blocks/paragraph-block/)
