/**
 *  BLOCK: Casino Software List
 */

        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const { TextControl,SelectControl } = wp.components

registerBlockType('casinotoplist/casino-software-list', {
    title: __('Casino Software List'),
    icon: 'visibility',
    category: 'casinotoplist',
    keywords: [
        __('casino software list'),
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
       
        qty: {
            type: 'string',

        },
        group_id: {
            type: 'string',

        },
        show_load_more: {
            type: 'string',
        },
        
    },

    edit(props) {

        var title = props.attributes.title;
        var qty = props.attributes.qty;
        var group_id = props.attributes.group_id;
        var show_load_more= props.attributes.show_load_more;
        function onChangeTitle(content) {
            props.setAttributes({title: content})
        }
        function onChangeQty(content) {
            props.setAttributes({qty: content})
        }
        function onChangeGroupId(content) {
            props.setAttributes({group_id: content})
        }
        var onChangeLoadMore = function (content) {
            props.setAttributes({show_load_more: content});
        };
        
        return (
                <div id="block-casino-software" >
                    <TextControl
                        label={__('Title')}
                        onChange={onChangeTitle} 
                        value={title}
                        placeholder={__('Title')}
                        />
                    <TextControl
                        label={__('Quantity')}
                        onChange={onChangeQty} 
                        value={qty}
                        placeholder={__('Quantity')}
                        />
                    <TextControl
                        label={__('Group Id')}
                        onChange={onChangeGroupId} 
                        value={group_id}
                        placeholder={__('Group Id')}
                        />
                    <SelectControl
                        label="Show Load More"
                        value={ show_load_more }
                        options={ [
                            { label: 'No', value: 'no' },
                            { label: 'Yes', value: 'yes' },                            
                        ] }
                        onChange={onChangeLoadMore} 
                    />    
                </div>
                )
    },
    save(props) {
        return null
    },
})