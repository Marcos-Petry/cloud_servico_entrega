output "public_ip" {
  description = "IP público da instância"
  value       = aws_instance.api.public_ip
}

output "instance_id" {
  description = "ID da instância EC2"
  value       = aws_instance.api.id
}