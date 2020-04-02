/**
 *  BLOCK: Casino List
 */

        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const { TextControl } = wp.components

registerBlockType('casinotoplist/casino-match', {
    title: __('Casion Match'),
    icon: 'screenoptions',
    category: 'casinotoplist',
    keywords: [
        __('casino match'),
    ],
    supports: {
        html: false,
        reusable: false,
        align: false
    },

    // Set up data model for custom block
    attributes: {
        title: {
            type: 'string',
        },
        sub_title: {
            type: 'string',

        },
    },

    edit(props) {

        var title = props.attributes.title;
        var sub_title = props.attributes.sub_title;
        function onChangeTitle(content) {
            props.setAttributes({title: content})
        }
        function onQtyTitle(content) {
            props.setAttributes({sub_title: content})
        }
        return (
                <div id="block-casino-match" >
                    <TextControl
                        label={__('Casino Match Title')}
                        onChange={onChangeTitle} 
                        value={title}
                        placeholder="Title"
                        />
                    <TextControl
                        label={__('Sub Heading')}
                        onChange={onQtyTitle} 
                        value={sub_title}
                        placeholder="sub heading"
                        />
                </div>
                )
    },
    save(props) {
        return null
    },
})