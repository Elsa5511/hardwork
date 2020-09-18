CREATE UNIQUE INDEX UNIQ_2DE8C6A3D60322AC ON user_role (role_id);
ALTER TABLE equipment_instance DROP FOREIGN KEY equipment_instance_ibfk_2;
ALTER TABLE equipment_instance DROP FOREIGN KEY equipment_instance_ibfk_3;
ALTER TABLE equipment_instance DROP FOREIGN KEY equipment_instance_ibfk_4;
ALTER TABLE equipment_instance DROP FOREIGN KEY equipment_instance_ibfk_5;
DROP INDEX idx_72f335f8517fe9fe ON equipment_instance;
CREATE INDEX FK_equipment_instance ON equipment_instance (equipment_id);
DROP INDEX idx_72f335f85e9e89cb ON equipment_instance;
CREATE INDEX FK_equipment_instance_location ON equipment_instance (location);
DROP INDEX idx_72f335f8218f7464 ON equipment_instance;
CREATE INDEX FK_equipment_instance_usage ON equipment_instance (usage_status);
DROP INDEX idx_72f335f8cf60e67c ON equipment_instance;
CREATE INDEX FK_equipment_instance_owner ON equipment_instance (owner);
ALTER TABLE equipment_instance ADD CONSTRAINT equipment_instance_ibfk_2 FOREIGN KEY (usage_status) REFERENCES equipment_instance_taxonomy (equipment_instance_taxonomy_id);
ALTER TABLE equipment_instance ADD CONSTRAINT equipment_instance_ibfk_3 FOREIGN KEY (equipment_id) REFERENCES equipment (equipment_id);
ALTER TABLE equipment_instance ADD CONSTRAINT equipment_instance_ibfk_4 FOREIGN KEY (location) REFERENCES location_taxonomy (location_taxonomy_id);
ALTER TABLE equipment_instance ADD CONSTRAINT equipment_instance_ibfk_5 FOREIGN KEY (owner) REFERENCES organization (organization_id);
ALTER TABLE training_section_attachment DROP FOREIGN KEY FK_CD93806629D591C;
DROP INDEX idx_cd93806629d591c ON training_section_attachment;
CREATE INDEX IDX_E6C08F245B13BW63A ON training_section_attachment (training_section_id);
ALTER TABLE training_section_attachment ADD CONSTRAINT FK_CD93806629D591C FOREIGN KEY (training_section_id) REFERENCES training_section (section_id);