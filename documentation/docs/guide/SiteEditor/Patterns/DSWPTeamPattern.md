# DSWP Team Pattern

## Overview
This pattern creates a series of team member profiles, alternating between white and light gray backgrounds. Each profile features a circular image, name, subtitle, and detailed biography in a two-column layout.

::: warning Important Note
Each pattern consists of several blocks. Only adjust the content and color block settings. The structural settings (padding and margins) are pre-configured for responsiveness. Modifying structural settings may break the pattern.
:::

## Pattern Components
![Pattern Components](/images/patterns/dswp-team-pattern/a.png)

Each team member section contains:
1. **Image**
   - 180px width circular image
   - Aspect ratio 1:1
   - Object-fit: cover
   - Left-aligned
   
2. **Heading**
   - H5 heading (2.0 line height)

3. **Subtitle**
   - Italicized subtitle (H6 size)
   - 
   
4. **Paragraph**
   - Three paragraphs of biography

**Section Container**
   - Alternating backgrounds:
     - White 
     - Light gray


## Common Tasks

#### Profile Image:
1. Select the image block
2. Click "Replace"
3. Upload square image (automatically crops to circle)
4. Maintains 180px width and 1:1 ratio
![Image replacement](/images/patterns/dswp-team-pattern/b.gif)

#### Modifying the Heading:
1. Click on the heading text
2. Type your new heading

![Modifying the Heading](/images/patterns/dswp-team-pattern/c.gif)

#### Modifying the Sub-Heading:
1. Click on the sub-heading text
2. Type your new heading

![Modifying the Heading](/images/patterns/dswp-team-pattern/d.gif)
   
#### Modifying the Paragraph:
1. Click to edit paragraph text
2. Start Typing new content

![Modifying the Paragraph](/images/patterns/dswp-team-pattern/e.gif)

#### To Add a Card:
1. Click the ellipses (⋮) next to any profile card (see gif below)
2. Select "Duplicate"
3. Exapnd the new profile to see the group a layer down
4. Select block styles
5. Select background
6. This step is dependant if the previous profile has a background or not.  If the previous profile has a background color select clear in the color picker else select "light gray".

![Adding a Card](/images/patterns/dswp-team-pattern/f.gif)

### Layout Considerations
- Desktop: Side-by-side layout
- Tablet: Maintains side-by-side
- Mobile: Stacks with image above content left aligned
![Responsive behavior](/images/patterns/dswp-team-pattern/g.gif)

## Block Documentation
For detailed instructions on modifying specific blocks, refer to WordPress's official documentation:
- [Image Block](https://wordpress.com/support/wordpress-editor/blocks/image-block/)
- [Heading Block](https://wordpress.com/support/wordpress-editor/blocks/heading-block/)
- [Paragraph Block](https://wordpress.com/support/wordpress-editor/blocks/paragraph-block/)
