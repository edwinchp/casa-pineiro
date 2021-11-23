export const genericMixin = {
    methods: {
        shortAttribute(att, limit) {
            if (att.length <= limit) {
                return att.substring(0, limit);
            }
            return att.substring(0, limit) + "...";
        },
    }
}